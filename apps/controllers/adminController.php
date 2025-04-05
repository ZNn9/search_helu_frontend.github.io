<?php
class AdminController {
    public function index() {
        require_once __DIR__ . '/../views/admin/home/admin_index.php';
    }
    
    public function listaccount() {
        require_once __DIR__ . '/../views/admin/account/account_list.php';
    }
}
?>