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
            $stmt = $this->conn->prepare($sql);
            
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            
            //$username = $result['name'];
            
            if ($result) {
                session_start();
                $_SESSION['email'] = $result['email'];
                $_SESSION['name'] = $result['name'];
                $_SESSION['id'] = $result['id'];
                header("location:customer/dashboard.php");
            }else{
                echo "NOT";
            }
            
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function customerDeposit($sql)
    {
        try {
            $this->conn->exec($sql);
            echo "Succefully Deposit";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function customerWithdraw($sql)
    {
        try {
            $this->conn->exec($sql);
            echo "Succefully Withdraw";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function customerTransfer($sql)
    {
        try {
            $this->conn->exec($sql);
            echo "Succefully Transfer";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
    public function showTransfer($sql)
    {
        try {

            $stmt = $this->conn->prepare($sql);
            
            $stmt->execute();
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result;
            // while($row = $result){
            //         echo $row['email'];
            // }
        
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
