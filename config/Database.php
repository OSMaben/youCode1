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

            }catch(PDOException $e)
            {
                echo "connection failed:". $e->getMessage();
            }
        }

        //function to prepare queries
        public function query($sql)
        {
            $this->stml = $this->connect->prepare($sql);
        }
        public function prepare($sql) {
            return $this->connect->prepare($sql);
        }


        //excute a query
        public function execute()
        {
            return $this->stml->execute();
        }

        public function singleFetch()
        {
            $this->excute();//excute the query after 
            return $this->stml->fetch();
        }

        public function singleAll()
        {
            $this->excute();//excute the query after 
            return $this->stml->fetchAll();
        }

        //this method to cound the number of rows

        public function rowCount()
        {
            return $this->stml->rowCount();
        }

       

    }

?>