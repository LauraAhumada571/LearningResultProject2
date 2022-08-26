<?php
    class Connection{
        private $connect;

        public function __construct(){
            $connectionString = "mysql:hos=".DB_HOST.";dbname=".DB_NAME.";.DB_CHARSET.";
            try{
                $this->connect = new PDO($connectionString, DB_USER, DB_PASS);
                $this->connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (Exception $e) {
               $this->connect = "Could not connect to database";
               echo "ERROR: ". $e->getMesssage();
            }
        }

        public function connect(){
            return $this->connect;
        }
    }
?>