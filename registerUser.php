<?php
require __DIR__ . '/vendor/autoload.php';

use School\Dto\RegisterUserDto;
use School\Repository\UserRepository;
use School\Service\RegisterUser;
use School\Validator\IdentifierValidator\StudentIdentifierValidator;
use School\Validator\IdentifierValidator\TeacherIdentifierValidator;
use School\Validator\PasswordValidator\PasswordValidatorFactory;
use School\Validator\ValidatorCollection;
use School\Validator\DateValidator\DateValidator;
use School\Validator\EmailValidator\StudentEmailValidator;
use School\Validator\NameValidator\FirstNameValidator;
use School\Validator\NameValidator\LastNameValidator;
use School\Validator\PasswordValidator\ConfirmPasswordValidator;
use School\Validator\PasswordValidator\RidiculousPasswordValidator;


$configuration = require __DIR__ . '/config/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.1 405 Method Not Allowed');
    exit(0);
}

$paramsNeeded = [
    'email', 'school_identifier',
    'first_name', 'last_name',
    'confirm_password', 'password',
    'start_date', 'entry_date', 'is_teacher'
];
$paramsGiven = array_keys($_POST);

$paramsMissing = array_diff($paramsNeeded, $paramsGiven);

if (!empty($paramsMissing)) {
    header('HTTP/1.1 400 Bad Method');
    $errorMessage = sprintf('Provide the missing fields: %s', implode(', ', $paramsMissing));
    echo json_encode(['error' => ['message' => $errorMessage]]);
    exit(0);
}
try {
    //Construct the dto #done
    $userDto = RegisterUserDto::createFromGlobals();
    //Instantiate all needed validators based on configuration
    $validatorCollection = new ValidatorCollection();
    $validatorCollection->addValidator(PasswordValidatorFactory::createPasswordValidator($configuration['PASSWORD_STRENGTH']));
    $validatorCollection->addValidator(new ConfirmPasswordValidator());
    $validatorCollection->addValidator(new StudentEmailValidator($configuration['SCHOOL_PROVIDER_REGEX']));
    $validatorCollection->addValidator(new LastNameValidator());
    $validatorCollection->addValidator(new FirstNameValidator());
    $validatorCollection->addValidator(new DateValidator($configuration['DATE_DIFFERENCE_IN_DAYS']));
//    $validatorCollection->addValidator(new StudentIdentifierValidator());
    $validatorCollection->addValidator(new TeacherIdentifierValidator());

    foreach ($validatorCollection as $validator) {
        print_r(get_class($validator). " ");
        var_dump($validator->validate($userDto));
    }
    //Instantiate the repo
    $userRepository = new UserRepository();

    //Instantiate the register user service and call it
    $registerUser = new RegisterUser($validatorCollection, $userRepository);

    //Send back the error/succes response in JSON format
    header('HTTP/1.1 201 Created');
    echo json_encode($registerUser->registerUser($userDto));

} catch (Exception $e) {
    header('HTTP/1.1 500 Bad Method');
    $errorMessage = 'Whoops! ' . $e->getMessage();
    echo json_encode(['error' => ['message' => $errorMessage]]);
    exit(0);
}
