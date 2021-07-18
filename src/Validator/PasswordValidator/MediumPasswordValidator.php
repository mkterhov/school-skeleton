<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;

class MediumPasswordValidator extends AbstractValidator
{
    /**
     * WeakPasswordValidator constructor.
     */
    public function __construct()
    {
        $this->errorMessage= 'Password must have a minimum of 8 characters with at least one upper case letter!';
        $this->pattern = '/^(?=[A-Z]+)\w{7,}/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return preg_match($this->pattern, $dto->password) === 1;
    }
}