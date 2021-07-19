<?php


namespace School\Validator\IdentifierValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;

class TeacherIdentifierValidator extends AbstractValidator
{
    private array $array = ["TEA", "TEACH", "TEACHER"];

    public function __construct()
    {
        $this->fieldName = "school_identifier";
        $this->errorMessage = sprintf("Teacher id must start with %s, have 4 digits in the middle, and 1-3 alphanums in the end!", implode(',', $this->array));
        $this->pattern = '/^(' . implode('|', $this->array) . ')-\d{4}-\w{1,3}$/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return !(preg_match($this->pattern, $dto->schoolIdentifier) === 1);
    }
}