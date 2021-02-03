<?php

use Strategy\XmlSave;
use Strategy\CsvSave;
use Strategy\BaseLogic;
use Strategy\IFileSaver;

spl_autoload_register();

function dd($data)
{
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function saveStrategy($strategyCollection)
{
    foreach ($strategyCollection as $item) {
        if ($item instanceof IFileSaver) {
            $item->save();
        }
    }
}

saveStrategy([
    new XmlSave('main'),
    new CsvSave('main'),
]);
