<?php

    class Database
    {
        protected $connect;

        public function __construct($host="localhost",$db_name="youcode",$password="",$serverN = "root")
        {
            try{
                $this->connect = new PDO("mysql:host{$host},dbname{$db_name}",$password,$serverN);
            }catch(PDOException $e)
            {
                echo "connection failed". $e->getMessage();
            }
        }
    }

?>