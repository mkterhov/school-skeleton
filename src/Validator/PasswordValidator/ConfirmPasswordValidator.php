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
        $this->pattern = '/^(?=[A-Z]+)\w{7,}/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return !($dto->password === $dto->confirmPassword);
    }
}