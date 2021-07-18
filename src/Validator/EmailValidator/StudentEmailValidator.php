<?php


namespace School\Validator\EmailValidator;


use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class StudentEmailValidator implements ValidatorInterface
{
    protected string $pattern;
    protected string $errorMessage;

    public function __construct(string $provider)
    {
        $this->pattern = '/^((?<user>\w+)@(?<domain>gmail|yahoo|' . $provider . ')\.com)$/';
    }

    /**
     * @inheritDoc
     */
    public function validate(RegisterUserDto $dto): bool
    {
        return preg_match($this->pattern, $dto->email) === 1;
    }
}