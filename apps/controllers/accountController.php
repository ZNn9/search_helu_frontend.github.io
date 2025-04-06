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

    // Giải mã token và lấy thông tin người dùng
    public function getUserInfo()
    {
        if (!isset($_COOKIE['token'])) {
            return null;
        }

        $token = $_COOKIE['token'];
        $parts = explode('.', $token);

        if (count($parts) !== 3) {
            return null; // Token không hợp lệ
        }

        $payload = json_decode(base64_decode($parts[1]), true);

        if (!$payload) {
            return null; // Không thể giải mã payload
        }

        return $payload; // Trả về thông tin người dùng từ token
    }
    // Lấy danh sách role của người dùng
    public function getUserRoles()
    {
        $userInfo = $this->getUserInfo();
        $roles = $userInfo['roles'] ?? []; // Lấy danh sách roles từ token
    
        // Kiểm tra nếu roles không phải là mảng
        if (!is_array($roles)) {
            // Nếu roles là chuỗi, chuyển thành mảng
            $roles = [$roles];
        }
    
        // Chỉ lấy thuộc tính 'name' của từng role nếu roles là mảng các đối tượng
        $roleNames = array_map(function ($role) {
            if (is_array($role) && isset($role['name'])) {
                return $role['name'];
            }
            return is_string($role) ? $role : 'Unknown Role';
        }, $roles);
    
        return $roleNames;
    }

    // Lấy tên tài khoản của người dùng
    public function getAccountName()
    {
        $userInfo = $this->getUserInfo();
        return $userInfo['accountName'] ?? 'User';
    }

    public function getAccountId()
    {
        $userInfo = $this->getUserInfo();
        return $userInfo['sub'] ?? 'unknown';
    }
}
