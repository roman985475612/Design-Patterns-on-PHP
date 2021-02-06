<?php
namespace NullObject;


class UserRepository
{
    public function __construct(
        private IDatabaseAdapter $db,
    ) {}
    
    public function fetchById(int $id)
    {
        $sql = "SELECT * FROM `users` WHERE id={$id}";
        
        $row = $this->db->query($sql);
        if (is_null($row)) {
            return new NullUser;
        }
        return $this->createUser($row);
    }
    
    private function createUser($row)
    {
        return new User($row['id'], $row['login'], $row['email']);
    }
}