<?php
require __DIR__ . '/vendor/autoload.php';

use School\Dto\RegisterDtoValidatorCollection;
use School\Dto\RegisterUserDto;
use School\Repository\UserRepository;
use School\Service\RegisterUser;
use School\Service\ValidatorService;
use School\Service\ValidatorServiceStudent;


$configuration = require __DIR__ . '/config/config.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('HTTP/1.1 405 Method Not Allowed');
    exit(0);
}


$paramsGiven = array_keys($_POST);

$paramsMissing = array_diff(RegisterUserDto::requestParams, $paramsGiven);

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
    //todo move the $userDto out of CreateValidators logic, temp solution

    //Instantiate the repo
    $userRepository = new UserRepository();

    //Instantiate the register user service and call it
    $userDtoValidators = RegisterDtoValidatorCollection::createRegisterDtoValidatorCollection($userDto, $configuration);
    $registerUser = new RegisterUser($userDtoValidators, $userRepository);

    //Send back the error/succes response in JSON format
    header('HTTP/1.1 201 Created');
    echo json_encode($registerUser->registerUser($userDto));

} catch (Exception $e) {
    header('HTTP/1.1 500 Bad Method');
    $errorMessage = 'Whoops! ' . $e->getMessage();
    echo json_encode(['error' => ['message' => $errorMessage]]);
    exit(0);
}
