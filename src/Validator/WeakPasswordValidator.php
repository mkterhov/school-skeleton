<?php


namespace School\Validator;


use School\Dto\RegisterUserDto;
use School\Validator\ValidationRules\ValidationRule;

class WeakPasswordValidator implements ValidatorInterface
{
    protected string $pattern;

    /**
     * WeakPasswordValidator constructor.
     */
    public function __construct()
    {
        $this->pattern = '/^\w{6,} /';
    }

    /**
     * @inheritDoc
     */
    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->pattern, $dto->password) === 1;
    }
}