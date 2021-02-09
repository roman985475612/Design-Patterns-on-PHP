<?php
namespace Facade;


class Document
{
    public function __construct(
        private DB $db,
        private Log $log,
        private Mail $mail,
    ) {}
    
    public function save(string $message)
    {
        $this->db->connect();
        $this->db->saveDocument($message);
        $this->log->addLog($message);
        $this->mail->sendMessage($message);
    }
}