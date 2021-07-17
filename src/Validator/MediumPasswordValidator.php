<?php


namespace School\Validator;


use School\Dto\RegisterUserDto;

class MediumPasswordValidator implements ValidatorInterface
{
    protected string $pattern;

    /**
     * WeakPasswordValidator constructor.
     */
    public function __construct()
    {
        $this->pattern = '/^\w{8,}[A-Z]{1,}/';
    }

    /**
     * @inheritDoc
     */
    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->pattern, $dto->password) === 1;
    }
}