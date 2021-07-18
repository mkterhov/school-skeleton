<?php

namespace School\Service;

use School\Repository\UserRepository;
use School\Validator\ValidatorCollection;
use School\Dto\RegisterUserDto;

class RegisterUser
{
    private ValidatorCollection $validators;
    private UserRepository $userRepository;

    public function __construct(
        ValidatorCollection $validators,
        UserRepository $userRepository
    )
    {
        $this->validators = $validators;
        $this->userRepository = $userRepository;
    }

    /**
     * Returns a success array or an error message array. Also saves in the database.
     * @throws \Exception
     */
    public function registerUser(RegisterUserDto $dto): array
    {
        $validatorService = new RegisterUserValidatorService($dto, $this->validators);
        if (!$validatorService->passes()) {
            header('HTTP/1.1 400 Bad Method');
            return ['message' => 'Unable to create user!', 'errors' => $validatorService->validated()];
        }
        header('HTTP/1.1 201 Created');
        return ['success' => ['message' => 'User created']];
    }
}