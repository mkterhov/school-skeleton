<?php

use School\Validator\ValidatorCollection;
use School\Dto\RegisterUserDto;
use School\Repository\UserRepository;

class RegisterUser
{
    private ValidatorCollection $validators;
    private UserRepository $userRepository;

    public function __construct(
        ValidatorCollection $validators,
        UserRepository $userRepository
    ) {
        $this->validators = $validators;
        $this->userRepository = $userRepository;
    }

    /**
     * Returns a success array or an error message array. Also saves in the database.
     */
    public function registerUser(RegisterUserDto $dto): array
    {
        return [];
    }
}