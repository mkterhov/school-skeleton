<?php


namespace School\Validator\IdentifierValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;

class StudentIdentifierValidator extends AbstractValidator
{
    private array $array = ["ST", "STUD", "STUDENT"];

    public function __construct()
    {
        $this->fieldName = "school_identifier";
        $this->errorMessage = sprintf("Student id start with %s, have 4 digits in the middle, and 2-6 alphanums in the end!", implode(',', $this->array));
        $this->pattern = '/^(' . implode('|', $this->array) . ')-\d{4}-\w{2,6}$/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return !(preg_match($this->pattern, $dto->schoolIdentifier) === 1);
    }
}