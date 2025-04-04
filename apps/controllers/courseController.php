<?php
class CourseController {
    public function index() {
        require_once __DIR__ . '/../views/course/course_list.php';
    }

    public function show($id) {

        if (true) {
            include __DIR__ . '/../views/course/course_show.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    public function tiktok() {
        require_once __DIR__ . '/../views/tiktok/tiktok_list.php';
    }
}
?>