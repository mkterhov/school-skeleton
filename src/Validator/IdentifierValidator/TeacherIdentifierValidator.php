<?php


namespace School\Validator\IdentifierValidator;


use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class TeacherIdentifierValidator implements ValidatorInterface
{
    private array $array = ["TEA", "TEACH", "TEACHER"];
    protected string $pattern;
    protected string $errorMessage;

    public function __construct()
    {
        $this->pattern = '/^(' . implode('|', $this->array) . ')-\d{4}-\w{1,3}$/';
    }

    /**
     * @inheritDoc
     */
    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->pattern, $dto->schoolIdentifier) === 1;
    }
}