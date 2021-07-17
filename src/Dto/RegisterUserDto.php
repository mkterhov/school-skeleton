<?php

namespace School\Dto;

class RegisterUserDto
{
    public string $schoolIdentifier;
    public string $email;
    public string $firstName;
    public string $lastName;
    public string $confirmPassword;
    public string $password;
    public string $entryDate;
    public string $startDate;
    public bool $isTeacher;

    /**
     * @throws \Exception
     */
    public static function createFromGlobals(): RegisterUserDto
    {
        $registerDto = new self();

        try {
            $registerDto->isTeacher = (bool)$_POST['is_teacher'];
            $registerDto->firstName = $_POST['first_name'];
            $registerDto->email = $_POST['email'];
            $registerDto->lastName = $_POST['last_name'];
            $registerDto->confirmPassword = $_POST['confirm_password'];
            $registerDto->password = $_POST['password'];
            $registerDto->schoolIdentifier = $_POST['school_identifier'];
            $registerDto->startDate = $_POST['start_date'];
            $registerDto->entryDate = $_POST['entry_date'];
        } catch (\TypeError $e) {
            throw new \Exception("Error on reading the input fields! " . $e->getMessage());
        }

        return $registerDto;
    }
}