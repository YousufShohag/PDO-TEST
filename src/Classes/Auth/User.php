<?php

namespace App\classes\Auth;


use App\Storage\DB;
use PDOException;

// $object = new DB();

class User
{
    private DB $db;
    public function __construct(DB $db)
    {
        $this->db = $db;
    }
    public function registration($formData)
    {
        $name = $formData['name'];
        $email = $formData['email'];
        $password = md5($formData['password']);
        $password = $password;
        $role = 'customer';

        $sql = "INSERT INTO users (name,email,password,role) VALUES('$name','$email','$password','$role')";
        $this->db->user_register($sql);
    }

    public function login($formData)
    {
        $email = $formData['email'];
        $password = md5($formData['password']);
        $password = $password;

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $this->db->login_register($sql);
    }
}
