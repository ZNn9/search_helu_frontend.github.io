<?php

// Định nghĩa các đường dẫn cơ bản
define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/apps');

// Hàm tự động nạp các file model và helper
function autoload($className)
{
    $modelFile = APP_PATH . '/models/' . $className . '.php';
    $helperFile = APP_PATH . '/helper/' . $className . '.php';
    if (file_exists($modelFile)) {
        require_once $modelFile;
    } elseif (file_exists($helperFile)) {
        require_once $helperFile;
    }
}
spl_autoload_register('autoload');

// Khởi động session nếu chưa khởi động
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Lấy thông tin request
$request = $_SERVER['REQUEST_URI'];
$method = $_SERVER['REQUEST_METHOD'];
$path = trim(parse_url($request, PHP_URL_PATH), '/');

// Router cơ bản
$controller = 'Home'; // Controller mặc định
$action = 'index';    // Action mặc định
$params = [];         // Tham số
$isApi = false;

// Kiểm tra nếu là API
if (strpos($path, 'api/') === 0) {
    $isApi = true;
    $path = substr($path, 4);
}

// Xử lý token từ URL và tạo session
if (isset($_GET['token'])) {
    $token = $_GET['token'];
    setcookie('token', $token, time() + 3600, '/', '', false, true);
    $parts = explode('.', $token);
    if (count($parts) === 3) {
        $payload = json_decode(base64_decode($parts[1]), true);
        if (is_array($payload)) {
            unset($payload['UserName'], $payload['Password']);
            $_SESSION['AccountInfo'] = $payload;
        }
    }
    header('Location: /search_helu_frontend/home');
    exit;
}

// Danh sách quyền cho controller/action
$controllerPermissions = [
    'Admin' => ['*' => ['admin']]
];

// Danh sách controller public
$publicControllers = ['Home', 'Tiktok', 'Course', 'Account'];

// Xử lý phần còn lại của đường dẫn
if (!empty($path)) {
    $parts = explode('/', $path);

    if ($parts[0] === 'search_helu_frontend') {
        array_shift($parts);
    }

    if (!empty($parts[0])) $controller = ucfirst(strtolower($parts[0]));
    if (!empty($parts[1])) $action = strtolower($parts[1]);
    $params = array_slice($parts, 2);
}

// $controllerLower = strtolower($controller);

// Nếu không phải public controller và chưa login
if (!in_array($controller, $publicControllers) && empty($_SESSION['AccountInfo'])) {
    if ($isApi) {
        header('Content-Type: application/json');
        echo json_encode(['error' => 'Bạn cần đăng nhập để truy cập!']);
    } else {
        header('Location: /search_helu_frontend/account/login');
    }
    exit;
}

// Kiểm tra phân quyền
if (isset($controllerPermissions[$controller])) {
    $actionPermissions = $controllerPermissions[$controller];
        $requiredRoles = $actionPermissions[$action] ?? $actionPermissions['*'] ?? [];

    if (!empty($requiredRoles) && !SessionHelper::hasAnyRole($requiredRoles)) {
        if ($isApi) {
            header('Content-Type: application/json');
            echo json_encode(['error' => 'Bạn không có quyền truy cập action này!']);
        } else {
            echo "⛔ Bạn không có quyền truy cập [$controller/$action]";
        }
        exit;
    }
}

// Load controller
$controllerFile = APP_PATH . '/controllers/' . strtolower($controller) . 'Controller.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = $controller . 'Controller';

    if (class_exists($controllerClass)) {
        $controllerObj = new $controllerClass();

        if (method_exists($controllerObj, $action)) {
            try {
                $response = call_user_func_array([$controllerObj, $action], $params);
                if ($isApi) {
                    header('Content-Type: application/json');
                    echo json_encode($response ?: ['message' => 'Thành công']);
                }
            } catch (ArgumentCountError $e) {
                if ($isApi) {
                    header('Content-Type: application/json');
                    echo json_encode(['error' => "Thiếu tham số cho '$action'"]);
                } else {
                    echo "Lỗi: Thiếu tham số cho '$action'";
                }
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
        echo "Controller '$controller' không tồn tại!";
    }
} else {
    require_once APP_PATH . '/controllers/homeController.php';
    $controllerObj = new HomeController();
    if ($isApi) {
        header('Content-Type: application/json');
        echo json_encode(['message' => 'Trang index mặc định từ API']);
    } else {
        $controllerObj->index();
    }
}
