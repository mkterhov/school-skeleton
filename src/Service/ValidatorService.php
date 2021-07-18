<?php


namespace School\Service;


use School\Dto\RegisterUserDto;
use School\Validator\DateValidator\DateValidator;
use School\Validator\EmailValidator\EmailValidatorFactory;
use School\Validator\IdentifierValidator\IdentifierValidatorFactory;
use School\Validator\NameValidator\FirstNameValidator;
use School\Validator\NameValidator\LastNameValidator;
use School\Validator\PasswordValidator\ConfirmPasswordValidator;
use School\Validator\PasswordValidator\PasswordValidatorFactory;
use School\Validator\UserType;
use School\Validator\ValidatorCollection;

class ValidatorService implements ValidatorServiceInterface
{
    public ValidatorCollection $validatorCollection;
    protected RegisterUserDto $userDto;
    /**
     * AbstractRegisterUserValidatorService constructor.
     * @throws \Exception
     */
    public function __construct(RegisterUserDto $userDto,ValidatorCollection $validatorCollection)
    {
        $this->userDto = $userDto;
        $this->validatorCollection = $validatorCollection;
    }

    public function validated(): array
    {
        // TODO: Implement validated() method.
    }

    public function passes(): bool
    {
        foreach ($this->validatorCollection as $validator) {
            if(!$validator->validate($this->userDto)) {
                return false;
            }
        }
        return true;
    }
}