<?php
class AdminController {
    public function index() {
        require_once __DIR__ . '/../views/admin/home/admin_index.php';
    }
    
    public function listaccount() {
        require_once __DIR__ . '/../views/admin/account/account_list.php';
    }

    public function listcourses() {
        require_once __DIR__ . '/../views/admin/courses/courses_list.php';
    }
    
    public function listlesson() {
        require_once __DIR__ . '/../views/admin/lesson/lesson_list.php';
    }
    
    public function search() {
        require_once __DIR__ . '/../views/admin/home/admin_search_advanced.php';
    }

    // Lấy danh sách các bảng từ API
    // public function fetchTables()
    // {
    //     $apiUrl = 'http://localhost:3000/api/table';

    //     // Gửi yêu cầu đến API
    //     $ch = curl_init($apiUrl);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, [
    //         'Content-Type: application/json',
    //     ]);

    //     $response = curl_exec($ch);
    //     $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //     curl_close($ch);

    //     // Kiểm tra phản hồi từ API
    //     if ($httpCode === 200) {
    //         header('Content-Type: application/json');
    //         echo $response;
    //     } else {
    //         http_response_code($httpCode);
    //         echo json_encode(['error' => 'Failed to fetch tables from API.']);
    //     }
    // }

    // // Lấy danh sách các cột từ API
    // public function fetchColumns($tableName)
    // {
    //     $apiUrl = "http://localhost:3000/api/{$tableName}/attributes-name-only";

    //     // Gửi yêu cầu đến API
    //     $ch = curl_init($apiUrl);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, [
    //         'Content-Type: application/json',
    //     ]);

    //     $response = curl_exec($ch);
    //     $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    //     curl_close($ch);

    //     // Kiểm tra phản hồi từ API
    //     if ($httpCode === 200) {
    //         header('Content-Type: application/json');
    //         echo $response;
    //     } else {
    //         http_response_code($httpCode);
    //         echo json_encode(['error' => 'Failed to fetch columns from API.']);
    //     }
    // }
}
?>