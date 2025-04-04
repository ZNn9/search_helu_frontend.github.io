<?php
class BlogController {
    public function index() {
        require_once __DIR__ . '/../views/blog/blog_list.php';
    }

    public function show($id) {
        require_once __DIR__ . '/../views/blog/blog_show.php';
    }
}
?>