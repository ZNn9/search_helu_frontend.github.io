<?php
class CourseController
{
    public function index()
    {
        // Lấy giá trị tìm kiếm từ URL
        $query = isset($_GET['query']) ? trim($_GET['query']) : '';

        // Gửi dữ liệu tìm kiếm đến API
        $courses = [];
        if (!empty($query)) {
            $apiUrl = "http://127.0.0.1:3000/api/search/course"; // URL API
            $token = $_COOKIE['token'] ?? ''; // Lấy token từ cookie

            // Gửi tham số courseName đến API
            $response = $this->callApiWithTokenParams($apiUrl, ['courseName' => $query], $token);

            if ($response && isset($response['rows'])) {
                $courses = $response['rows']; // Lấy danh sách khóa học từ API
            }
        }
        else {
            $apiUrl = "http://127.0.0.1:3000/api/search/course"; // URL API
            $token = $_COOKIE['token'] ?? ''; // Lấy token từ cookie

            // Gửi tham số courseName đến API
            $response = $this->callApiWithToken($apiUrl, null, $token);

            if ($response && isset($response['rows'])) {
                $courses = $response['rows']; // Lấy danh sách khóa học từ API
            }
        }
        require_once __DIR__ . '/../views/course/course_list.php';
    }

    private function callApiWithTokenParams($url, $params, $token)
    {
        // Thêm tham số tìm kiếm vào URL
        $queryString = http_build_query($params);
        $urlWithParams = $url . '?' . $queryString;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $urlWithParams);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token, // Truyền token qua header
        ]);

        $response = curl_exec($ch);

        return json_decode($response, true);
    }
    
    private function callApiWithToken($url, $token)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Bearer ' . $token, // Truyền token qua header
        ]);

        $response = curl_exec($ch);

        return json_decode($response, true);
    }
    public function show($id)
    {
        if (isset($_GET['lesson'])) {
            $lessonId = intval($_GET['lesson']); // Lấy ID bài học từ URL
            // Đường dẫn chính xác đến lesson_detail.php
            include __DIR__ . '/../views/lesson/lesson_detail.php'; // Hiển thị trang chi tiết bài học
        } else {
            include __DIR__ . '/../views/course/course_show.php'; // Hiển thị trang khóa học
        }
    }
}
