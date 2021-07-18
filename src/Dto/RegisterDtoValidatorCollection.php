<?php


namespace School\Dto;


use School\Validator\DateValidator\DateValidator;
use School\Validator\EmailValidator\EmailValidatorFactory;
use School\Validator\IdentifierValidator\IdentifierValidatorFactory;
use School\Validator\NameValidator\FirstNameValidator;
use School\Validator\NameValidator\LastNameValidator;
use School\Validator\PasswordValidator\ConfirmPasswordValidator;
use School\Validator\PasswordValidator\PasswordValidatorFactory;
use School\Validator\UserType;
use School\Validator\ValidatorCollection;

class RegisterDtoValidatorCollection
{
    /**
     * @throws \Exception
     */
    public static function createRegisterDtoValidatorCollection(RegisterUserDto $userDto, array $config): ValidatorCollection
    {
        $validatorCollection = new ValidatorCollection();
        $userType = $userDto->isTeacher ? UserType::TEACHER : UserType::STUDENT;

        $validatorCollection->addValidator(new ConfirmPasswordValidator());
        $validatorCollection->addValidator(EmailValidatorFactory::createEmailValidator($userType,$config['SCHOOL_PROVIDER_REGEX']));
        $validatorCollection->addValidator(IdentifierValidatorFactory::createIdentifierValidator($userType));
        $validatorCollection->addValidator(new LastNameValidator());
        $validatorCollection->addValidator(PasswordValidatorFactory::createPasswordValidator($config['PASSWORD_STRENGTH']));
        $validatorCollection->addValidator(new FirstNameValidator());
        $validatorCollection->addValidator(new DateValidator($config['DATE_DIFFERENCE_IN_DAYS']));

        return $validatorCollection;
    }

}