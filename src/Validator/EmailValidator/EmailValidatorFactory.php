<?php


namespace School\Validator\EmailValidator;


use School\Validator\UserType;
use School\Validator\ValidatorInterface;

class EmailValidatorFactory
{
    public static function createEmailValidator(string $userType,$emailProvider): ValidatorInterface
    {
        $emailValidator = null;

        switch ($userType) {
            case UserType::TEACHER:
                $emailValidator = new TeacherEmailValidator($emailProvider);
                break;
            case UserType::STUDENT:
                $emailValidator = new StudentEmailValidator($emailProvider);
                break;
        }
        return $emailValidator;

    }
}