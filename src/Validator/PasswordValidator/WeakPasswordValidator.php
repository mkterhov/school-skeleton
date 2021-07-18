<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;

class WeakPasswordValidator extends AbstractValidator
{
    public function __construct()
    {
        $this->errorMessage= 'Password must have a minimum of 6 characters!';
        $this->pattern = '/^(?=[A-Z]+)\w{7,}/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return strlen($dto->password) > 6;
    }
}