<?php

namespace School\Validator;

class ValidatorCollection implements \Iterator, \Countable
{
    private array $validators;

    /**
     * ValidatorCollection constructor.
     * @param array $validators
     */
    public function __construct(array $validators = [])
    {
        $this->validators = $validators;
    }

    public function addValidator(ValidatorInterface $validator): self
    {
        array_push($this->validators, $validator);
        return new self($this->validators);
    }

    public function removeValidator(ValidatorInterface $validator): self
    {
        if (!in_array($validator, $this->validators, true)) {
            return $this;
        }
        array_filter($this->validators, function ($val) use ($validator) {
            return $validator === $val;
        });
        return new self($this->validators);
    }

    public function current(): ValidatorInterface
    {
        return current($this->validators);
    }

    public function next()
    {
        return next($this->validators);
    }

    public function key()
    {
        return key($this->validators);

    }

    public function valid(): bool
    {
        return key($this->validators) !== null;
    }

    public function rewind()
    {
        return reset($this->validators);

    }

    public function count(): int
    {
        return count($this->validators);

    }
}