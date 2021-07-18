<?php


namespace School\Validator\IdentifierValidator;


use School\Validator\UserType;
use School\Validator\ValidatorInterface;

class IdentifierValidatorFactory
{
    public static function createIdentifierValidator(string $userType): ValidatorInterface
    {
        $identifierValidator = null;

        switch ($userType) {
            case UserType::TEACHER:
                $identifierValidator = new TeacherIdentifierValidator();
                break;
            case UserType::STUDENT:
                $identifierValidator = new StudentIdentifierValidator();
                break;
        }
        return $identifierValidator;

    }
}