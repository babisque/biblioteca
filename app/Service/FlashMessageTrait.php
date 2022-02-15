<?php

namespace App\Library\Service;

trait FlashMessageTrait
{
    public function messageDefine(string $type, string $message): void
    {
        $_SESSION['message_type'] = $type;
        $_SESSION['message'] = $message;
    }
}