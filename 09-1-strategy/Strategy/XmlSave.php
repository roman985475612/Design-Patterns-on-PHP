<?php
namespace Strategy;

class XmlSave extends BaseSave
{
    public function save()
    {
        $oldname = 'tmp/' . $this->filepath . '.xml';
        $newname = 'xml/' . $this->filepath . '.xml';
        if (file_exists($oldname)) {
            copy($oldname, $newname);
        }
    }
}