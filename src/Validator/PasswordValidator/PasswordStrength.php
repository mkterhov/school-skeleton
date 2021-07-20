<?php


namespace School\Validator\PasswordValidator;


class PasswordStrength
{
    public const STRENGTH_LEVEL = [
        'WEAK' => 'Weak',
        'MEDIUM' => 'Medium',
        'STRONG' => 'Strong',
        'RIDICULOUS' => 'Ridiculous'
    ];
    public const PASSWORD_VALIDATOR = 'PasswordValidator';
}