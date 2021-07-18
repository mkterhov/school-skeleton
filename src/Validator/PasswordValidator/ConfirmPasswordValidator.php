<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;
use School\Validator\ValidatorInterface;

class ConfirmPasswordValidator extends AbstractValidator
{
    public function __construct()
    {
        $this->errorMessage= 'Confirm password and the password differ!!';
        $this->pattern = '/^(?=[A-Z]+)\w{7,}/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return $dto->password == $dto->confirmPassword;
    }
}