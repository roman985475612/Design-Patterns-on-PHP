<?php
namespace Strategy;

class CsvSave extends BaseSave
{
    public function save()
    {
        $oldname = 'tmp/' . $this->filepath . '.csv';
        $newname = 'csv/' . $this->filepath . '.csv';
        if (file_exists($oldname)) {
            copy($oldname, $newname);
        }
    }
}