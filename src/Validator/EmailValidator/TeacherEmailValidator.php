<?php


namespace School\Validator\EmailValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;

class TeacherEmailValidator extends AbstractValidator
{
    public function __construct(string $provider)
    {
        $this->pattern = '/^(?<user>\w+)@(?<domain>' . $provider . '\.com)$/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return preg_match($this->pattern, $dto->email) === 1;
    }
}