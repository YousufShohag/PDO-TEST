<?php

namespace App\Storage;

// Here Use PDO Library
use PDO;
use PDOException;


class DB
{
    private $hostName = "localhost";
    private $databaseName = "banking_app";
    private $userName = "root";
    private $password = "";
    private $conn;

    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=$this->hostName;dbname=$this->databaseName", $this->userName, $this->password);
            // set the PDO error mode to exception
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            //echo "Connected successfully";
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }
    public function createTable($sql)
    {
        try {
            $this->conn->exec($sql);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function user_register($sql)
    {
        try {
            $this->conn->exec($sql);
            echo "Data Register";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function login_register($sql)
    {
        try {
            $this->conn->prepare($sql);
            $this->conn->execute();
            $result = $this->conn->fetch(PDO::FETCH_ASSOC);
            return result;
           // header("location:customer/dashboard.html");
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    // public function user_registration($formData)
    // {
    //     $name = $formData['name'];
    //     $email = $formData['email'];
    //     $password = md5($formData['password']);
    //     $password = $password;

    //     $result = $this->conn->query("INSERT INTO users (name,email,password) VALUES('$name','$email','$password')");

    //     if ($result) {
    //         echo "Data Registerd";
    //     } else {
    //         echo "Not";
    //     }
    // }
}
