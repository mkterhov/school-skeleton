<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;

class WeakPasswordValidator extends AbstractValidator
{
    public function __construct()
    {
        $this->fieldName = 'password';
        $this->errorMessage = 'Password must have a minimum of 6 characters!';
        $this->pattern = '/(?=.[A-Z]*.)\w{6,}/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return !(strlen($dto->password) > 6);
    }
}