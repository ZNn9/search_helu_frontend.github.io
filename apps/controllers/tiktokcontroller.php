<?php
class TiktokController
{
    public function index()
    {
        require_once __DIR__ . '/../views/tiktok/tiktok_home.php';
    }

    public function account($id)
    {
        if (true) {
            include __DIR__ . '/../views/tiktok/tiktok_people.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }
    public function profile($id)
    {

        if (true) {
            include __DIR__ . '/../views/tiktok/tiktok_profile.php';
        } else {
            echo "Không thấy sản phẩm.";
        }
    }

    public function advancedsearch()
    {
        require_once __DIR__ . '/../views/tiktok/tiktok_advanced_search.php';
    }
}
