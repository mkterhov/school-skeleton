<?php


namespace School\Validator\PasswordValidator;


use Exception;
use School\Validator\ValidatorInterface;

class PasswordValidatorFactory
{
    /**
     * @throws \Exception
     */
    public static function createPasswordValidator(string $strengthLevel): ValidatorInterface
    {

        $className = "School\\Validator\\PasswordValidator\\" . ucfirst(strtolower($strengthLevel)) . PasswordStrength::PASSWORD_VALIDATOR;
        if (class_exists($className) === false) {
            throw new Exception("Class $className not found.");
        }
        return new $className();
    }
}