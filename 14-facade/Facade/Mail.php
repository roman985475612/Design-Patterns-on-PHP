<?php
namespace Facade;


class Mail
{
    public function __construct(
        private string $to,
        private string $subject,
        private string $headers,
    ) {}
    
    public function sendMessage(string $message)
    {
        mail(
            $this->to,
            $this->subject,
            $message,
            $this->headers,
        );
    }
}