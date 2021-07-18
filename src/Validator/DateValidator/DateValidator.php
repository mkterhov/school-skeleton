<?php


namespace School\Validator\DateValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;
use School\Validator\ValidatorInterface;

class DateValidator extends AbstractValidator
{
    private int $dateDifferenceInDays;

    /**
     * DateValidator constructor.
     */
    public function __construct(int $dateDifferenceInDays)
    {
        $this->dateDifferenceInDays = $dateDifferenceInDays;
    }


    /**
     * @throws \Exception
     */
    protected function fails(RegisterUserDto $dto): bool
    {
        $entryDate = new \DateTime($dto->entryDate);
        $startDate = new \DateTime($dto->startDate);
        $interval = $entryDate->diff($startDate);
        $interval->format("%r%H:%i:%s");
        $differenceDays = boolval($interval->invert) ? -$interval->days : $interval->days;
        return $differenceDays >= $this->dateDifferenceInDays;
    }
}