<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class ConfirmPasswordValidator implements ValidatorInterface
{

    /**
     * @inheritDoc
     */
    public function validate(RegisterUserDto $dto): bool
    {
        return $dto->password == $dto->confirmPassword;
    }
}