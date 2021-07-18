<?php


namespace School\Validator;


use School\Dto\RegisterUserDto;

abstract class AbstractValidator implements ValidatorInterface
{
    protected string $pattern;
    protected string $errorMessage;

    /**
     * @inheritDoc
     * @throws \School\Validator\ValidationException
     */
    public function validate(RegisterUserDto $dto): bool
    {
        if (!$this->fails($dto)) {
            throw new ValidationException($this->errorMessage);
        }
        return true;
    }

    abstract protected function fails(RegisterUserDto $dto): bool;
}