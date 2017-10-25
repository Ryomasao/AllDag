<?php

namespace App\myclass\Messenger;

class MailMessenger implements Messenger{
    public function sendMessage($message)
    {
        return "send $message by mail!";
    }
}