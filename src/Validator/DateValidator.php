<?php


namespace School\Validator;


use School\Dto\RegisterUserDto;

class DateValidator implements ValidatorInterface
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
     * @inheritDoc
     * @throws \Exception
     */
    public function validate(RegisterUserDto $dto): bool
    {
        $entryDate = new \DateTime($dto->entryDate);
        $startDate = new \DateTime($dto->startDate);
        $interval = $entryDate->diff($startDate);
        $interval->format("%r%H:%i:%s");
        $differenceDays = boolval($interval->invert) ? -$interval->days: $interval->days;
        return $differenceDays >= $this->dateDifferenceInDays;
    }
}