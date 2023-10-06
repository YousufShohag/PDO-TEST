<?php

namespace App\Database;

use App\Storage\DB;

class Migration
{
    private DB $db;
    public function __construct(DB $db)
    {
        $this->db = $db;
    }
    public function run()
    {
        // $dirPath contain path to directory whose files are to be listed 
        $files = glob(__DIR__ . "/Migrations/*");
        foreach ($files as $file) {
            if (is_file($file)) {
                $sql = file_get_contents($file);
                $this->db->createTable($sql);
                echo basename($file) . "<br>";
            }
        }
    }
}
