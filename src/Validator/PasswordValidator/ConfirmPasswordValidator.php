<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class ConfirmPasswordValidator implements ValidatorInterface
{
    protected string $errorMessage;

    /**
     * @inheritDoc
     */
    public function validate(RegisterUserDto $dto): bool
    {
        return $dto->password == $dto->confirmPassword;
    }
}