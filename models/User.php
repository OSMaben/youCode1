<?php
    require_once 'config/Database.php';

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

        public function findUserByMail($table, $email)
        {
            $this->database->query("SELECT * FROM {$table} WHERE email = $email");
            $row = $this->database->singleAll();

            if($this->database->rowCount() > 0)
            {
                return $row;
            }
            else
            {
                return false;
            }
        }

        public function loginUser($email, $password)
        {
            $stmt = $this->database->prepare("SELECT * FROM users WHERE email = '$email'");
            $stmt->execute();
            $user = $stmt->fetch();

            if ($user && $password == $user['password']) {
                return $user;
            } else {
                return false;
            }
        }

        public function getUsers()
        {
           $stml = $this->database->prepare("SELECT * FROM users");
            $stml->execute();
            $user = $stml->fetchALL(PDO::FETCH_ASSOC);
            return $user;
        }
    }

?>