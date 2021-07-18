<?php


namespace School\Validator\EmailValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;
use School\Validator\ValidationException;
use School\Validator\ValidatorInterface;

class StudentEmailValidator extends AbstractValidator
{
    public function __construct(string $provider)
    {

        $this->errorMessage="";
        $this->pattern = '/^((?<user>\w+)@(?<domain>gmail|yahoo|' . $provider . ')\.com)$/';
    }

    public function fails(RegisterUserDto $dto): bool
    {
        return preg_match($this->pattern, $dto->email) === 1;
    }
}