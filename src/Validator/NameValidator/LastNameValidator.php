<?php


namespace School\Validator\NameValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;

class LastNameValidator extends AbstractValidator
{
    public function __construct()
    {
        $this->fieldName = 'last_name';
        $this->errorMessage = "Last name must start with an uppercase letter, and / or be split by '-' !";
        $this->pattern = '/^\p{Lu}(([\p{L}]+(-|\s){0,1}(([\p{Lu}][\p{L}]+){0,})){1})$/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        //validates that the lastname starts with uppercase
        //and allows it to be hyphened
        return !(preg_match($this->pattern, $dto->lastName) === 1);
    }
}