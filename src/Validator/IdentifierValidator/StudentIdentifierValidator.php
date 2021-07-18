<?php


namespace School\Validator\IdentifierValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;
use School\Validator\ValidatorInterface;

class StudentIdentifierValidator extends AbstractValidator
{
    private array $array = ["ST", "STUD", "STUDENT"];

    public function __construct()
    {
        $this->pattern = '/^(' . implode('|', $this->array) . ')-\d{4}-\w{2,6}$/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return preg_match($this->pattern, $dto->schoolIdentifier) === 1;
    }
}