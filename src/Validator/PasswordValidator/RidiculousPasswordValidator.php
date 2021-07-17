<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;

class RidiculousPasswordValidator extends StrongPasswordValidator
{
    //switch to preg later on
    public function validate(RegisterUserDto $dto): bool
    {
        return parent::validate($dto) &&
            !$this->containsLastNameFirstName($dto->password, $dto->firstName, $dto->lastName);
    }

    private function containsLastNameFirstName($password, $firstName, $lastName): bool
    {
        return stripos($password, $firstName) !== false || stripos($password, $lastName) !== false;
    }
}