<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;
use School\Validator\ValidatorInterface;

class ConfirmPasswordValidator extends AbstractValidator
{
    protected function fails(RegisterUserDto $dto): bool
    {
        return $dto->password == $dto->confirmPassword;
    }
}