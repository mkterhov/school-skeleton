<?php


namespace School\Validator;


use School\Dto\RegisterUserDto;

class StudentEmailValidator implements ValidatorInterface
{
    protected string $pattern;

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