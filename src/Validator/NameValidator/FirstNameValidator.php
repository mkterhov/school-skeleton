<?php


namespace School\Validator\NameValidator;


use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class FirstNameValidator implements ValidatorInterface
{
    protected string $pattern;
    protected string $errorMessage;

    /**
     * FirstNameValidator constructor.
     */
    public function __construct()
    {
        $this->pattern = '/^\p{Lu}\p{L}+$/';
    }

    /**
     * @inheritDoc
     */
    public function validate(RegisterUserDto $dto): bool
    {
        //validates that the firstname starts with uppercase
        return preg_match($this->pattern, $dto->firstName) === 1;
    }
}