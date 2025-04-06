<?php
session_start();

// Định nghĩa các đường dẫn cơ bản
define('BASE_PATH', __DIR__);
define('APP_PATH', BASE_PATH . '/apps');

// Hàm tự động nạp các file model
function autoload($className)
{
    $file = APP_PATH . '/models/' . $className . '.php';
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
$params = [];         // Danh sách tham số
$isApi = false;

// Kiểm tra nếu là yêu cầu API (ví dụ: /api/)
if (strpos($path, 'api/') === 0) {
    $isApi = true;
    $path = substr($path, 4); // Loại bỏ 'api/' khỏi đường dẫn
}

// Kiểm tra nếu URL chứa callback từ Google Auth
if (strpos($path, 'auth/google/callback') !== false && isset($_GET['code'])) {
    // Lấy mã code từ URL
    $code = $_GET['code'];

    // Gửi yêu cầu đến API để lấy token
    $ch = curl_init('http://127.0.0.1:8000/api/auth/google/callback?code=' . urlencode($code));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($ch);
    curl_close($ch);

    // Chuyển đổi phản hồi thành JSON
    $data = json_decode($response, true);

    // Kiểm tra nếu API trả về token
    if (isset($data['token'])) {
        // Lưu token vào cookie
        setcookie('token', $data['token'], time() + 3600, '/', '', false, true); // Cookie tồn tại trong 1 giờ

        // Debug: Kiểm tra token
        error_log('Token đã được lưu vào cookie: ' . $data['token']);

        // Chuyển hướng về trang home
        header('Location: /search_helu_frontend/home');
        exit;
    } else {
        // Nếu không có token, chuyển hướng về trang login
        error_log('Không nhận được token từ API, chuyển hướng về trang login.');
        header('Location: /search_helu_frontend/account/login');
        exit;
    }
}

// Xử lý đường dẫn sau khi loại bỏ tiền tố (nếu có)
if (!empty($path)) {
    $parts = explode('/', $path);

    // Ưu tiên xử lý tiền tố /search_helu_frontend/
    if ($parts[0] === 'search_helu_frontend') {
        array_shift($parts); // Loại bỏ 'search_helu_frontend'
    }

    // Thiết lập controller và action
    if (!empty($parts[0])) {
        $controller = ucfirst(strtolower($parts[0]));
    }
    if (!empty($parts[1])) {
        $action = strtolower($parts[1]);
    }

    // Lấy danh sách tham số còn lại
    $params = array_slice($parts, 2);
}
// Xây dựng đường dẫn file controller
$controllerFile = APP_PATH . '/controllers/' . strtolower($controller) . 'Controller.php';

if (file_exists($controllerFile)) {
    require_once $controllerFile;
    $controllerClass = $controller . 'Controller';

    if (class_exists($controllerClass)) {
        $controllerObj = new $controllerClass();

        if (method_exists($controllerObj, $action)) {
            // Gọi phương thức tương ứng với danh sách tham số
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
