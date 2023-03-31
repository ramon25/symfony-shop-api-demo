<?php

namespace App\Message;

use App\Entity\User;

final class ResetPasswordRequestMessage
{

    public function __construct(private string $email)
    {
    }

    public function getEmail(): string
    {
        return $this->email;
    }

}
