<?php
class BlogController {
    public function index() {
        require_once __DIR__ . '/../views/blog/blog_list.php';
    }

    public function show($id) {
        if (true) {
            include __DIR__ . '/../views/blog/blog_show.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }


}
?>