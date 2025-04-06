<?php
class CourseController
{
    public function index()
    {
        require_once __DIR__ . '/../views/course/course_list.php';
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
?>