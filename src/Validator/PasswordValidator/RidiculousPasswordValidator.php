<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;

class RidiculousPasswordValidator extends StrongPasswordValidator
{
    public function __construct()
    {
        parent::__construct();
        $this->errorMessage .= ' And must not contain the lastname or the firstname!';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return !(!parent::fails($dto) && !$this->containsLastNameFirstName($dto->password, $dto->firstName, $dto->lastName));
    }

    private function containsLastNameFirstName($password, $firstName, $lastName): bool
    {
        return stripos($password, $firstName) !== false || stripos($password, $lastName) !== false;
    }

}
