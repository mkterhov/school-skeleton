<?php


namespace School\Validator\IdentifierValidator;


use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class StudentIdentifierValidator implements ValidatorInterface
{
    private array $array = ["ST", "STUD", "STUDENT"];
    protected string $pattern;
    protected string $errorMessage;


    public function __construct()
    {
//        $this->pattern = '/^((?<first>' . implode('|', $this->array) . ')-(?<second>\d{4})-(?<third>\W{2,6})$/';
        $this->pattern = '/^(' . implode('|', $this->array) . ')-\d{4}-\w{2,6}$/';
    }

    /**
     * @inheritDoc
     */
    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->pattern, $dto->schoolIdentifier) === 1;
    }
}