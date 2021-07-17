<?php


namespace School\Validator\NameValidator;


use School\Dto\RegisterUserDto;
use School\Validator\ValidatorInterface;

class FirstNameValidator implements ValidatorInterface
{

    /**
     * @inheritDoc
     */
    public function validate(RegisterUserDto $dto): bool
    {
        //validates that the firstname starts with uppercase
        $pattern = '/^\p{Lu}\p{L}+$/';
        return preg_match($pattern, $dto->firstName) === 1;
    }
}