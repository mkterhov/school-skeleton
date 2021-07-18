<?php


namespace School\Validator\NameValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;
use School\Validator\ValidatorInterface;

class FirstNameValidator extends AbstractValidator
{
    /**
     * FirstNameValidator constructor.
     */
    public function __construct()
    {
        $this->pattern = '/^\p{Lu}\p{L}+$/';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        return preg_match($this->pattern, $dto->firstName) === 1;
    }
}