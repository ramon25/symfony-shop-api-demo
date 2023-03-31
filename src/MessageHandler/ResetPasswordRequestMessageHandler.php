<?php

namespace App\MessageHandler;

use App\Message\ResetPasswordRequestMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

final class ResetPasswordRequestMessageHandler implements MessageHandlerInterface
{
    public function __invoke(ResetPasswordRequestMessage $message)
    {
        //dump($message);
        // do something with your message
    }
}
