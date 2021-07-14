<?php
namespace School\Validator;

use School\Dto\RegisterUserDto;

interface ValidatorInterface
{
    /**
     * Returns true if the validation was performed successfully, throws an exception otherwise.
     */
    public function validate(RegisterUserDto $dto): bool;
}