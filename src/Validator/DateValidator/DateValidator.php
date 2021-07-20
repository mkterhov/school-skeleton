<?php


namespace School\Validator\DateValidator;


use School\Dto\RegisterUserDto;
use School\Validator\AbstractValidator;
use School\Validator\ValidationException;

class DateValidator extends AbstractValidator
{
    private int $dateDifferenceInDays;

    public function __construct(int $dateDifferenceInDays)
    {
        $this->fieldName = 'date';
        $this->errorMessage = sprintf('Dates must be valid and start date must be at least %d days after entry date! ', $dateDifferenceInDays);
        $this->dateDifferenceInDays = $dateDifferenceInDays;
    }

    /**
     * @throws ValidationException
     */
    protected function fails(RegisterUserDto $dto): bool
    {
        try {
            $entryDate = new \DateTime($dto->entryDate);
            $startDate = new \DateTime($dto->startDate);
            $interval = $entryDate->diff($startDate);
            $interval->format("%r%H:%i:%s");
            $differenceDays = $interval->invert ? -$interval->days : $interval->days;
            return !($differenceDays >= $this->dateDifferenceInDays);
        } catch (\Exception $e) {
            throw new ValidationException("Problem with the format of the entry date or start date!");
        }
    }
}