<?php

namespace Core;

use Core\ValidationException;
use Core\Validator;

class LoginForm {
    protected $errors = [];

    public function __construct(public array $attributes)
    {
        if(!Validator::email($attributes['email'])) {
            $this->errors['email'] = 'Please provide a valid email address';
        }

        if(!Validator::checkLength($attributes['password'], 6, 24)) {
            $this->errors['password'] = 'Password must be between 6 and 24 characters long';
        }
    }

    public static function validate($attributes) {
        // instantiate the class (works this way cause this method is static)
        $instance = new static($attributes);

        return  $instance->hasErrors() ?  $instance->throw() : $instance;
    }

    // Throw an exception
    public function throw() {
        ValidationException::throw($this->errors(), $this->attributes);
    }

    // Check if has any errors
    public function hasErrors() {
        return count($this->errors);
    }

    // Return errors array
    public function errors() {
        return $this->errors;
    }

    // Create an error
    public function addError($field, $message) {
        $this->errors[$field] = $message;

        return $this;
    }
}

?>