<?php


namespace School\Service;


interface ValidatorServiceInterface
{
    public function validated(): array;
    public function passes(): bool;
}