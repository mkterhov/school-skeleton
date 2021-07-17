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