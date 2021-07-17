<?php
require __DIR__ . '/vendor/autoload.php';

use School\Dto\RegisterUserDto;
use School\Repository\UserRepository;
use School\Service\RegisterUser;
use School\Validator\ValidatorCollection;

$configuration = require __DIR__ . '/config/config.php';
//Construct the dto #done

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.1 405 Method Not Allowed');
    exit(0);
}
$paramsNeeded = [
    'email', 'school_identifier',
    'first_name', 'last_name',
    'confirm_password', 'password',
    'start_date', 'entry_date'
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
    $userDto = RegisterUserDto::createFromGlobals();

    $validatorCollection = new ValidatorCollection();
    $userRepository = new UserRepository();

    $registerUser = new RegisterUser($validatorCollection, $userRepository);

    header('HTTP/1.1 201 Created');
    echo json_encode($registerUser->registerUser($userDto));

} catch (Exception $e) {
    header('HTTP/1.1 500 Bad Method');
    $errorMessage = 'Whoops! Something went wrong on our side :/';
    echo json_encode(['error' => ['message' => $errorMessage]]);
    exit(0);
}


//Instantiate all needed validators based on configuration


//Instantiate the repo
//Instantiate the register user service and call it
//Send back the error/succes response in JSON format
