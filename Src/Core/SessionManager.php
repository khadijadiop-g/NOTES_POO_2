<?php

class SessionManager{

private function __construct(){}
   public static function init_session(): void {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}


public static function set_session(string $key, mixed $value): void {
    $_SESSION[$key] = $value;
}

public static function get_session(string $key, mixed $default = null): mixed {
    return $_SESSION[$key] ?? $default;
}

public static function unset_session(string $key): void {
    unset($_SESSION[$key]);
}

public static function destroy_session(): void {
    session_unset();
    session_destroy();
}

}