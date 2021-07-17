<?php


namespace School\Validator;


use School\Dto\RegisterUserDto;

class WeakPasswordValidator implements ValidatorInterface
{
    /**
     * @inheritDoc
     */
    public function validate(RegisterUserDto $dto): bool
    {
        return strlen($dto->password) > 6;
    }
}