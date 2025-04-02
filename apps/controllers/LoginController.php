<?php
require_once 'vendor/autoload.php';
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class LoginController {
    private $secretKey = '9MlwAkiXu4xLp1gGxgFaDh1D6qrMTkExHPBWryv6LcIZ1mCEYIs2jvkrqn0LZXO2';

    public function login() {
        // Giả sử xác thực thành công (kiểm tra username/password)
        $user = ['id' => 1, 'email' => 'user@example.com', 'role' => 'user'];
        $payload = [
            'iss' => 'http://localhost/search_helu_frontend',
            'aud' => 'http://localhost/search_helu_frontend',
            'iat' => time(),
            'exp' => time() + (60 * 60), // Hết hạn sau 1 giờ
            'data' => $user
        ];
        // $token = JWT::encode($payload, $secretKey, 'HS256');
        header('Content-Type: application/json');
        // echo json_encode(['token' => $token]);
    }

    public function checkAuth() {
        $headers = apache_request_headers();
        if (isset($headers['Authorization'])) {
            $token = str_replace('Bearer ', '', $headers['Authorization']);
            try {
                $decoded = JWT::decode($token, new Key($this->secretKey, 'HS256'));
                return true; // Xác thực thành công
            } catch (\Exception $e) {
                header('Content-Type: application/json');
                echo json_encode(['error' => 'Token không hợp lệ']);
                return false;
            }
        }
        return false;
    }
}
?>