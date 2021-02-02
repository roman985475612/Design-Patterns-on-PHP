<?php
namespace Observer;

class ChangeTitlePlugin implements \SplObserver
{
    public function update( \SplSubject $subject, string $event = 'all' )
    {
        if (isset($subject->title)) {
            $subject->title .= ' create event';
        }
    }
}