<?php
namespace Observer;

class ChangeTextPlugin implements \SplObserver
{
    public function update( \SplSubject $subject, string $event = 'all' )
    {
        if (isset($subject->text)) {
            $subject->text .= ' create event';
        }
    }
}