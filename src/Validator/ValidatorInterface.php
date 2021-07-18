<?php

namespace School\Validator;

use School\Dto\RegisterUserDto;

interface ValidatorInterface
{
    /**
     * Returns true if the validation was performed successfully, throws an exception otherwise.
     * @throws ValidationException
     */
    public function validate(RegisterUserDto $dto): bool;

    //todo do the same with composition e.g. class that is FieldValidator and uses ValidatorInterface
    public function getFieldName(): string;
}