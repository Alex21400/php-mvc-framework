<?php

namespace Core;

use Core\App;
use Core\Database;
use Core\Session;

class Authenticator {

    // Attempt to login with given credentials
    public function attempt($email, $password) {
        $user = App::resolve(Database::class)->query("SELECT * FROM users WHERE email = :email", [
            ':email' => $email
        ])->find();

        if($user) {
            if(password_verify($password, $user['password'])) {
                $this->login($user);

                return true;
            }
        }

        return false;
    }

    // login the user
    public function login($user) {
        $_SESSION['user'] = [
            'email' => $user['email']
        ];

        session_regenerate_id(true);
    }

    // logout the user
    public function logout() {
        Session::destroy();
    }
}

?>