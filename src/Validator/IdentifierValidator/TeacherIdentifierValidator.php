<?php


namespace School\Validator\IdentifierValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;

class TeacherIdentifierValidator extends AbstractValidator
{
    private array $array = ["TEA", "TEACH", "TEACHER"];

    public function __construct()
    {
        $this->pattern = '/^(' . implode('|', $this->array) . ')-\d{4}-\w{1,3}$/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return preg_match($this->pattern, $dto->schoolIdentifier) === 1;
    }
}