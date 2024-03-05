<?php

namespace Core;

class Session {

    // Check if session has given key
    public static function has($key) {
        return (bool) isset($_SESSION[$key]);
    }

    // Set a session
    public static function put($key, $value) {
        $_SESSION[$key] = $value;
    }

    // Return a session for a given key or return default
    public static function get($key, $default = null) {
        // check for flash key first
        if(isset($_SESSION['_flash'][$key])) {
            return $_SESSION['_flash'][$key];
        }

        return $_SESSION[$key] ?? $default;
    }

    // Make a flash session which expires very shortly
    public static function flash($key, $value) {
        $_SESSION['_flash'][$key] = $value;
    }

    // Expire flash sessions
    public static function unflash() {
        unset($_SESSION['_flash']);
    }

    // Destroy the session
    public static function destroy() {
        $_SESSION = [];
        session_destroy();

        $params = session_get_cookie_params();
        setcookie('PHPSESSID', '', time() - 3600, $params['path'], $params['domain'], $params['secure'], $params['httponly']);

        header('location: /');
        exit();
    }
}