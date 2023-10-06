<?php

namespace App\classes\Deposit;

use App\Storage\DB; //!USE DATABASE HERE


class customerDeposit
{
    private DB $db;
    public function __construct(DB $db)
    {
        $this->db = $db;
    }
    public function insertDeposit($formData)
    {
        $amount = $formData['amount'];
        $customerId = $_SESSION['id'];

        $sql = "INSERT INTO customerDeposit (customerId,depositMoney) VALUES('$customerId','$amount')";
        $this->db->customerDeposit($sql);
    }

    
}
