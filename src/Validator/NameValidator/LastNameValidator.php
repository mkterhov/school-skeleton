<?php


namespace School\Validator\NameValidator;


use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class LastNameValidator implements ValidatorInterface
{

    public function validate(RegisterUserDto $dto): bool
    {
        //validates that the lastname starts with uppercase
        //and allows it to be hyphened
        $pattern = '/^\p{Lu}([\p{L}-]+)$/';
        return preg_match($pattern, $dto->firstName) === 1;
    }
}