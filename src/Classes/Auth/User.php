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
        //$result = $this->db->exec($sql);


        // if ($result === True) {
        //     echo "Data Registerd";
        // } else {
        //     echo "Not";
        // }

        // try {
        //     $this->db->exec($sql);
        // } catch (PDOException $e) {
        //     echo $sql . "<br>" . $e->getMessage();
        // }
    }

    public function login($formData)
    {
        $email = $formData['email'];
        $password = md5($formData['password']);
        $password = $password;

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $this->db->login_register($sql);

        var_dump($result);

        //$result = $this->connection->query("SELECT * FROM user WHERE email = '$email' AND password = '$password'");

        // if ($result->num_rows > 0) {
        //     // session_start();
        //     // $_SESSION['email'] = $data;
        //     //$_SESSION['email'] = $formData['email'];
        //     //$_SESSION['name'] = $formData['name'];
        //     // header("location:customer/dashboard.php");
        //     echo '<div class="alert alert-danger" role="alert">
        //             Data OK
        //             </div>';
        // } else {
        //     echo '<div class="alert alert-danger" role="alert">
        //             Sorry! Invalid Information
        //             </div>';
        // }
    }
}
