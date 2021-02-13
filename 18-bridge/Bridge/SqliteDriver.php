<?php
namespace Bridge;


class SqliteDriver implements IDriver
{
    private \SQLite3 $sqlite;
    
    public function __construct(
        string $filepath,
    ) {
        $this->sqlite = new \SQLite3($filepath);
        // $this->sqlite->query("CREATE TABLE messages(id, text)");
    }
    
    public function execute(string $query)
    {
        $this->sqlite->query($query);
    }
}