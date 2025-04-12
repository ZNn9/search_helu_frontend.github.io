<?php
class SessionHelper {
    public static function hasAnyRole($allowedRoles = []) {
        if (session_status() === PHP_SESSION_NONE) session_start();
        $userRoles = $_SESSION['AccountInfo']['roles'] ?? [];
    
        foreach ($userRoles as $role) {
            if (in_array(strtolower($role['name']), array_map('strtolower', $allowedRoles))) {
                return true;
            }
        }
        return false;
    }
}
