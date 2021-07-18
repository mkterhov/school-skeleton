<?php


namespace School\Validator\NameValidator;


use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class LastNameValidator implements ValidatorInterface
{
    protected string $pattern;
    protected string $errorMessage;

    /**
     * FirstNameValidator constructor.
     */
    public function __construct()
    {
        $this->pattern ='/^\p{Lu}([\p{L}-]+)$/';
    }

    public function validate(RegisterUserDto $dto): bool
    {
        //validates that the lastname starts with uppercase
        //and allows it to be hyphened
        return preg_match($this->pattern, $dto->firstName) === 1;
    }
}