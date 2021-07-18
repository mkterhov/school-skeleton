<?php


namespace School\Service;


use School\Dto\RegisterUserDto;
use School\Validator\ValidationException;
use School\Validator\ValidatorCollection;

class RegisterUserValidatorService implements ValidatorServiceInterface
{
    public ValidatorCollection $validatorCollection;
    protected RegisterUserDto $userDto;

    /**
     * @throws \Exception
     */
    public function __construct(RegisterUserDto $userDto, ValidatorCollection $validatorCollection)
    {
        $this->userDto = $userDto;
        $this->validatorCollection = $validatorCollection;
    }

    public function validated(): array
    {
        $validationErrorMessages = [];
        foreach ($this->validatorCollection as $validator) {
            try {
                $validator->validate($this->userDto);
            } catch (ValidationException $exception) {
                array_push($validationErrorMessages, $exception->getMessage());
            }
        }
        return $validationErrorMessages;
    }

    public function passes(): bool
    {
        foreach ($this->validatorCollection as $validator) {
            try {
                $validator->validate($this->userDto);
            } catch (ValidationException $exception) {
                return false;
            }
        }
        return true;
    }
}