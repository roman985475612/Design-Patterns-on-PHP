<?php
namespace NullObject;


class User implements IUser
{
    private string $id;
    private string $login;
    private string $email;
    
    public function __construct(string $id, string $login, string $email) {
        $this->setId($id);
        $this->setLogin($login);
        $this->setEmail($email);
    }
    
    public function setId(string $id)
    {
        $this->id = $id;
        
        return $this;
    }
    
    public function getId()
    {
        return $this->id;
    }
    
    public function setLogin(string $login)
    {
        if (strlen($login) < 2) {
            throw new \Exception('Login error');
        }
        
        $this->login = $login;
        
        return $this;
    }
    
    public function getLogin()
    {
        return $this->login;
    }
    
    public function setEmail(string $email)
    {
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new \Exception('Email error');
        }
        $this->email = $email;
        
        return $this;
    }
    
    public function getEmail()
    {
        return $this->email;
    }

}