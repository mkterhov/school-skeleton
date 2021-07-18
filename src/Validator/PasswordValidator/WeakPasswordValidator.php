<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class WeakPasswordValidator implements ValidatorInterface
{
    protected string $errorMessage;

    /**
     * @inheritDoc
     */
    public function validate(RegisterUserDto $dto): bool
    {
        return strlen($dto->password) > 6;
    }
}