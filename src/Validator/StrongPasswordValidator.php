<?php


namespace School\Validator;


use School\Dto\RegisterUserDto;

class StrongPasswordValidator implements ValidatorInterface
{
    protected string $pattern;

    /**
     * WeakPasswordValidator constructor.
     */
    public function __construct()
    {
        $this->pattern = '\w{8,}[A-Z]{1,}[0-9]{1,}[^a-zA-Z0-9_\s]{1,}';
    }

    /**
     * @inheritDoc
     */
    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->pattern, $dto->password) === 1;
    }
}