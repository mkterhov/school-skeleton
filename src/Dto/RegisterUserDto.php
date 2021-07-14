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

    public static function createFromGlobals(): RegisterUserDto {
        //implement the creation from globals
        return new self();
    }

}