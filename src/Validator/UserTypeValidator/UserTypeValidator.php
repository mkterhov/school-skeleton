<?php


namespace School\Validator\UserTypeValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;

class UserTypeValidator extends AbstractValidator
{
    public function __construct()
    {
        $this->fieldName = 'is_teacher';
        $this->errorMessage = 'Is teacher must be boolean!';
    }

    protected function fails(RegisterUserDto $dto): bool
    {
        if(!is_bool($dto->isTeacher)) {
            return true;
        }
        return false;
    }
}