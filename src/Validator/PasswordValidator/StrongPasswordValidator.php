<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;

class StrongPasswordValidator extends AbstractValidator
{
    /**
     * WeakPasswordValidator constructor.
     */
    public function __construct()
    {
        $this->errorMessage= 'Password must have 10 characters, one upper case letter, one digit and at one non-alphanumeric character!';
        $this->pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_])\S{10,}$/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return preg_match($this->pattern, $dto->password) === 1;
    }
}