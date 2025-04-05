<?php
class AccountController {

    public function index() {
        require_once __DIR__ . '/#';
    }

    public function login() {
        require_once __DIR__ . '/../views/account/login.php';
    }

    public function logout() {
        require_once __DIR__ . '/../views/account/login.php';
    }

    public function register() {
        require_once __DIR__ . '/../views/account/register.php';
    }

    public function adminList() {
        require_once __DIR__ . '/../views/account/account_list.php';
    }
}
?>