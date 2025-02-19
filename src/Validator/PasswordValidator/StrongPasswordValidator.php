<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;

class StrongPasswordValidator extends AbstractValidator
{
    public function __construct()
    {
        $this->fieldName = 'password';
        $this->errorMessage = 'Password must have 10 characters, one upper case letter, one digit and at one non-alphanumeric character!';
        $this->pattern = '/(?=.*[A-Z].)(?=.*[a-z])(?=.*\d)(?=.*[\W])\S{10,}$/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return !(preg_match($this->pattern, $dto->password) === 1);
    }
}