<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;
use School\Validator\ValidatorInterface;

class WeakPasswordValidator extends AbstractValidator
{
    protected function fails(RegisterUserDto $dto): bool
    {
        return strlen($dto->password) > 6;
    }
}