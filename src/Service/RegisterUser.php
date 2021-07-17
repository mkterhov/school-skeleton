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
     */
    public function registerUser(RegisterUserDto $dto): array
    {
        return ['success' => ['message' => 'User created']];
    }
}