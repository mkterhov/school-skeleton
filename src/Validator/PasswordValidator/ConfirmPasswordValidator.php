<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;

class ConfirmPasswordValidator extends AbstractValidator
{
    public string $fieldName;

    public function __construct()
    {
        $this->fieldName = 'confirm_password';
        $this->errorMessage = 'Confirm password and the password must be identical!!';
        $this->pattern = '//';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        $this->pattern = '/' . $dto->password . '/';

        return !($dto->password === $dto->confirmPassword);
    }
}