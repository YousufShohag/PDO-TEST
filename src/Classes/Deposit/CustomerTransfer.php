<?php

namespace App\Classes\Deposit;

use App\Storage\DB;


class CustomerTransfer{
    private DB $db;
    public function __construct(DB $db){
        $this->db = $db;
    }
    public function insertTransfer($formData){
        $customerId = $_SESSION['id'];
        $email = $formData['email'];
        $transferMoney = $formData['amount'];
        $currentDate = date('Y-m-d');
        $sql = "INSERT INTO customerTransfer (customerId,email,transferMoney,date) VALUES('$customerId','$email','$transferMoney','$currentDate')";
        $this->db->customerTransfer($sql);
    }
    public function showTransfer(){
        $sql = "SELECT * FROM customerTransfer";
        $this->db->showTransfer($sql);
    }
}