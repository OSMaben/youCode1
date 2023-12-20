<?php
    require_once '../config/Database.php';

    class User{
        public $database;
        public function __construct()
        {
            $this->database = new Database();
        }
    }

?>