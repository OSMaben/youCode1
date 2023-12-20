<?php

    class Database
    {
        public $connect;
        public $stml;

        public function __construct($db_host = "localhost",$db_user = "root",$db_pass = "",$db_name = "youcode")
        {
            try
            {
                $this->connect = new PDO("mysql:host={$db_host};dbname={$db_name}",$db_user,$db_pass);

            }catch(PDOException $ohomo)
            {
                echo "connection failed:". $ohomo->getMessage();
            }
        }


        //function to prepare queries
        public function query($sql)
        {
            $this->stml = $this->connect->prepare($sql);
        }

        //excute a query
        public function excute()
        {
            return $this->stml->excute();
        }

        public function singleFetch()
        {
            $this->excute();//excute the query after 
            return $this->
        }
    }

?>