<?php
namespace NullObject;


class NullUser implements IUser
{
    private string $id;
    private string $login;
    private string $email;
    
    public function __construct() {
        $this->id = $this->getId();
        $this->login = $this->getLogin();
        $this->email = $this->getEmail();
    }
    
    public function setId(string $id) {}
    public function setLogin(string $login) {}
    public function setEmail(string $email) {}
    
    public function getId()
    {
        return "Id is empty";
    }
    
    public function getLogin()
    {
        return "Login is empty";
    }
    
    public function getEmail()
    {
        return "Email is empty";
    }
}