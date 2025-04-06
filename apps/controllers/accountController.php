<?php
class AccountController
{

    public function index()
    {
        require_once __DIR__ . '/#';
    }

    // Trang đăng nhập
    public function login()
    {
        require_once __DIR__ . '/../views/account/login.php';
    }

    // Xử lý đăng xuất
    public function logout()
    {
        // Xóa token khỏi cookie
        setcookie('token', '', time() - 3600, '/'); // Đặt thời gian hết hạn trong quá khứ

        // Chuyển hướng về trang đăng nhập
        header('Location: /search_helu_frontend/account/login');
        exit;
    }

    public function isLoggedIn()
    {
        if (!empty($_COOKIE['token'])) {
            error_log('Người dùng đã đăng nhập. Token: ' . $_COOKIE['token']);
            return true;
        }

        error_log('Người dùng chưa đăng nhập.');
        return false;
    }


    // Lấy thông tin tài khoản
    public function getAccountInfo()
    {
        // Kiểm tra nếu người dùng chưa đăng nhập
        if (!$this->isLoggedIn()) {
            header('Location: /search_helu_frontend/account/login');
            exit;
        }

        // Lấy token từ cookie
        $token = $_COOKIE['token'];

        // Gọi API để lấy thông tin tài khoản
        $host = $_SERVER['HTTP_HOST']; // Lấy domain hiện tại (localhost hoặc 127.0.0.1)
        $ch = curl_init("http://$host:8000/api/auth/google/account");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [ 
            'Authorization: Bearer ' . $token
        ]);
        $response = curl_exec($ch);
        curl_close($ch);

        // Chuyển đổi phản hồi thành JSON
        $data = json_decode($response, true);

        // Kiểm tra nếu API trả về lỗi
        if (isset($data['error'])) {
            echo 'Lỗi: ' . $data['error'];
            exit;
        }

        return $data; // Trả về thông tin tài khoản
    }

    // Trang thông tin tài khoản
    public function profile()
    {
        // Lấy thông tin tài khoản
        $accountInfo = $this->getAccountInfo();

        // Hiển thị trang profile
        require_once __DIR__ . '/../views/tiktok/tiktok_profile.php';
    }

    public function handleGoogleCallback()
    {
        try {
            // Lấy mã code từ URL
            $code = $_GET['code'] ?? null;

            if (!$code) {
                header('Location: /search_helu_frontend/account/login');
                exit;
            }

            // Gửi yêu cầu đến API để xử lý callback từ Google
            $ch = curl_init('http://127.0.0.1:8000/api/auth/google/callback?code=' . urlencode($code));
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $response = curl_exec($ch);
            curl_close($ch);

            $data = json_decode($response, true);

            // Kiểm tra nếu API trả về token
            if (isset($data['token'])) {
                // Lưu token vào cookie
                setcookie('token', $data['token'], time() + 3600, '/', '', false, true);
                error_log('Cookie token đã được lưu: ' . $data['token']);

                // Chuyển hướng về trang home
                header('Location: /search_helu_frontend/home');
                exit;
            } else {
                // Nếu không có token, chuyển hướng về trang login
                error_log('Không nhận được token từ API, chuyển hướng về trang login.');
                header('Location: /search_helu_frontend/account/login');
                exit;
            }
        } catch (Exception $e) {
            // Nếu xảy ra lỗi, chuyển hướng về trang login
            error_log('Lỗi khi xử lý callback Google: ' . $e->getMessage());
            header('Location: /search_helu_frontend/account/login');
            exit;
        }
    }
}
