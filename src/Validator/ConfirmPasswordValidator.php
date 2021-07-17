<?php


namespace School\Validator;


use School\Dto\RegisterUserDto;

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