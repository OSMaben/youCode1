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

        public function getUsers($id)
        {
            $stml = $this->database->prepare("SELECT * FROM users WHERE id_role = $id");
            $stml->execute();
            $user = $stml->fetchAll(PDO::FETCH_ASSOC);  // Fetch as associative array
            if($user)
            {
                return $user;
            }
            else
                return false;
        }

        public function getSingleUser($id)
        {
            $stml = $this->database->prepare("SELECT * FROM users WHERE id_user = $id");
            $stml->execute();
            $user = $stml->fetch(PDO::FETCH_ASSOC);  // Fetch as associative array
            if($user)
            {
                return $user;
            }
            else
                return false;
        }

        public function suppremeUser($table, $id)
        {
                $stml = $this->database->prepare("DELETE FROM $table WHERE id_user = $id");
                $result = $stml->execute();
                return $result;
        }

        public function insert($table, $columns,$values)
        {
            $columns = implode(",",$columns);
            $values = implode("','",$values);
            $stml = $this->database->prepare("INSERT INTO {$table} ({$columns}) VALUES ('{$values}')");
            $stml->execute();
            return $stml;
        }

        public function update($table, $key, $value, $id) {
            $updateData = '';

            for($i = 0; $i < count($key); $i++)
            {
                $updateData .= "{$key[$i]} = '{$value[$i]}'";
                if($i < count($key) - 1)
                {
                    $updateData .= ",";
                }
            }
            $stml = $this->database->prepare("UPDATE {$table} SET $updateData WHERE id_user = $id");
            $user = $stml->execute();
            return $user;
        }

    }

?>