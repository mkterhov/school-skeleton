<?php


namespace School\Validator\PasswordValidator;


use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class StrongPasswordValidator implements ValidatorInterface
{
    protected string $pattern;
    protected string $errorMessage;

    /**
     * WeakPasswordValidator constructor.
     */
    public function __construct()
    {
        $this->pattern = '/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[\W_])\S{10,}$/';
    }

    /**
     * @inheritDoc
     */
    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->pattern, $dto->password) === 1;
    }
}