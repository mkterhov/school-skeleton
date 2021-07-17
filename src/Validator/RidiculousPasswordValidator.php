<?php


namespace School\Validator;


use School\Dto\RegisterUserDto;

class RidiculousPasswordValidator extends StrongPasswordValidator
{
    //switch to preg later on
    public function validate(RegisterUserDto $dto): bool
    {
        return parent::validate($dto) && stristr($dto->password, $dto->firstName, false) && stristr($dto->password, $dto->firstName);
    }
}