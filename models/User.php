<?php
    require_once '../../config/Database.php';

    class User{
        public $database;
        
        public function __construct()
        {
            $this->database = new Database();
        }

        public function RegisterUser($table , $attributes, $values)
        {
            $newAtt = implode(',', $attributes);
            $newVal = implode("','", $values);
            $register = "INSERT INTO {$table} ({$newAtt}) VALUES ('{$newVal}')";
            $stmt = $this->database->connect->prepare($register);
            $stmt->execute();
            return $stmt;
        }

        public function findUserByNameOrMail($table, $email, $password)
        {
            $this->database->query("SELECT * FROM USE {$table} WHERE email = $email and password = $password");
            
        }
    }

?>