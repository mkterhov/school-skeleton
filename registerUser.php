<?php
require __DIR__ . '/vendor/autoload.php';

use School\Dto\RegisterDtoValidatorCollection;
use School\Dto\RegisterUserDto;
use School\Repository\UserRepository;
use School\Service\RegisterUser;


$configuration = require __DIR__ . '/config/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Content-Type: application/json');
    header('HTTP/1.1 405 Method Not Allowed');
    exit(0);
}


$paramsGiven = array_keys($_POST);

$paramsMissing = array_diff(RegisterUserDto::requestParams, $paramsGiven);

if (!empty($paramsMissing)) {
    header('Content-Type: application/json');
    header('HTTP/1.1 400 Bad Method');
    $errorMessage = sprintf('Provide the missing fields: %s', implode(', ', $paramsMissing));
    try {
        echo json_encode(['error' => ['message' => $errorMessage]], JSON_THROW_ON_ERROR);
    } catch (JsonException $e) {

    }
    exit(0);
}
try {
    //Construct the dto #done
    $userDto = RegisterUserDto::createFromGlobals();
    //Instantiate all needed validators based on configuration
    //todo move the $userDto out of CreateValidators logic, temp solution

    //Instantiate the repo
    $userRepository = new UserRepository();

    //Instantiate the register user service and call it
    $userDtoValidators = RegisterDtoValidatorCollection::createRegisterDtoValidatorCollection($userDto, $configuration);
    $registerUser = new RegisterUser($userDtoValidators, $userRepository);

    //Send back the error/success response in JSON format
    echo json_encode($registerUser->registerUser($userDto), JSON_THROW_ON_ERROR);
} catch (Exception $e) {
    header('Content-Type: application/json');

    header('HTTP/1.1 500 Internal Server Error');
    $errorMessage = 'Whoops! ' . $e->getMessage();
    echo json_encode(['error' => ['message' => $errorMessage]], JSON_THROW_ON_ERROR);
    exit(0);
}
