<?php
session_start();

// Định nghĩa các đường dẫn cơ bản
define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/apps');

// Hàm tự động nạp các file model
function autoload($className) {
    $file = APP_PATH . '/model/' . $className . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
spl_autoload_register('autoload');

// Lấy thông tin request
$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];

// Xử lý URL
$path = trim(parse_url($request, PHP_URL_PATH), '/');

// Router cơ bản
$controller = 'Home'; // Controller mặc định
$action = 'index';    // Action mặc định
$isApi = false;

// Kiểm tra nếu là yêu cầu API (ví dụ: /api/)
if (strpos($path, 'api/') === 0) {
    $isApi = true;
    $path = substr($path, 4); // Loại bỏ 'api/' khỏi đường dẫn
}

// Xử lý đường dẫn sau khi loại bỏ tiền tố (nếu có)
if (!empty($path)) {
    $parts = explode('/', $path);

    // Ưu tiên xử lý tiền tố /search_helu_frontend/
    if ($parts[0] === 'search_helu_frontend') {
        array_shift($parts); // Loại bỏ 'search_helu_frontend' khỏi mảng
        if (!empty($parts)) {
            $controller = ucfirst(strtolower($parts[0])) ?: 'Home';
            $action = !empty($parts[1]) ? strtolower($parts[1]) : 'index';
        }
    } else {
        // Xử lý các trường hợp khác (không có search_helu_frontend)
        $controller = ucfirst(strtolower($parts[0])) ?: 'Home';
        $action = !empty($parts[1]) ? strtolower($parts[1]) : 'index';
    }
}

// Xây dựng đường dẫn file controller
$controllerFile = APP_PATH . '/controllers/' . strtolower($controller) . 'Controller.php';
if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = $controller . 'Controller';
    if (class_exists($controllerClass)) {
        $controllerObj = new $controllerClass();
        if (method_exists($controllerObj, $action)) {
            if ($isApi) {
                // Phản hồi API dưới dạng JSON
                header('Content-Type: application/json');
                $response = $controllerObj->$action();
                echo json_encode($response ?: ['message' => 'Thành công']);
            } else {
                // Phản hồi giao diện web
                $controllerObj->$action();
            }
        } else {
            if ($isApi) {
                header('Content-Type: application/json');
                echo json_encode(['error' => "Action '$action' không tồn tại!"]);
            } else {
                echo "Action '$action' không tồn tại!";
            }
        }
    } else {
        if ($isApi) {
            header('Content-Type: application/json');
            echo json_encode(['error' => "Controller '$controller' không tồn tại!"]);
        } else {
            echo "Controller '$controller' không tồn tại!";
        }
    }
} else {
    // Fallback về HomeController
    require_once APP_PATH . '/controllers/homeController.php';
    $controllerObj = new HomeController();
    if ($isApi) {
        header('Content-Type: application/json');
        echo json_encode(['message' => 'Trang index mặc định từ API']);
    } else {
        $controllerObj->index();
    }
}
?>