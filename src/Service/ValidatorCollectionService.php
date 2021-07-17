<?php


namespace School\Service;


use School\Validator\DateValidator\DateValidator;
use School\Validator\EmailValidator\StudentEmailValidator;
use School\Validator\EmailValidator\TeacherEmailValidator;
use School\Validator\IdentifierValidator\StudentIdentifierValidator;
use School\Validator\IdentifierValidator\TeacherIdentifierValidator;
use School\Validator\NameValidator\FirstNameValidator;
use School\Validator\NameValidator\LastNameValidator;
use School\Validator\PasswordValidator\ConfirmPasswordValidator;
use School\Validator\PasswordValidator\PasswordValidatorFactory;
use School\Validator\ValidatorCollection;

class ValidatorCollectionService
{
    //creates the validators based on the configs
    /**
     * @throws \Exception
     */
    public static function createValidators(array $config, $userDto): ValidatorCollection
    {
        $validatorCollection = new ValidatorCollection();
        $validatorCollection->addValidator(PasswordValidatorFactory::createPasswordValidator($config['PASSWORD_STRENGTH']));
        $validatorCollection->addValidator(new ConfirmPasswordValidator());
        $emailValidator = $userDto->isTeacher ? new TeacherEmailValidator($config['SCHOOL_PROVIDER_REGEX']) : new StudentEmailValidator($config['SCHOOL_PROVIDER_REGEX']);
        $validatorCollection->addValidator($emailValidator);
        $validatorCollection->addValidator(new LastNameValidator());
        $validatorCollection->addValidator(new FirstNameValidator());
        $validatorCollection->addValidator(new DateValidator($config['DATE_DIFFERENCE_IN_DAYS']));
        $identifierValidator = $userDto->isTeacher ? new TeacherIdentifierValidator() : new StudentIdentifierValidator();
        $validatorCollection->addValidator($identifierValidator);

        return $validatorCollection;
    }
}