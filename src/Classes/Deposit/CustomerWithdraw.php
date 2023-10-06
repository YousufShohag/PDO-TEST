<?php

namespace App\classes\Deposit;

use App\Storage\DB; //!USE DATABASE HERE


class CustomerWithdraw
{
    private DB $db;
    public function __construct(DB $db)
    {
        $this->db = $db;
    }
    public function insertWithdraw($formData)
    {
        $withdrawMoney = $formData['amount'];
        $customerId = $_SESSION['id'];

        $sql = "INSERT INTO customerWithdraw (customerId,withdrawMoney) VALUES('$customerId','$withdrawMoney')";
        $this->db->customerWithdraw($sql);
    }

    
}
