<?php
namespace Observer;

class SendMailPlugin implements \SplObserver
{
    public function update( \SplSubject $subject, string $event = 'all' )
    {
        echo 'Send Email';
    }
}