<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;

class MediumPasswordValidator extends AbstractValidator
{
    public function __construct()
    {
        $this->fieldName = 'password';
        $this->errorMessage = 'Password must have a minimum of 8 characters with at least one upper case letter!';
        $this->pattern = '/(?=.[A-Z]*.)\w{8,}/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return !(preg_match($this->pattern, $dto->password) === 1);
    }
}