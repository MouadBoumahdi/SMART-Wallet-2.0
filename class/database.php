<?php
    class Database{
        private string $host = "localhost";
        private string $username = "root";
        private string $password = "";
        private string $dbname = "smart_wallet";
        private ?PDO $conn = null;


       public function getConnection():PDO{
            if($this->conn == null){
                try{
                    $dsn = "mysql:host={$this->host};dbname={$this->dbname}";

                    $this->conn = new PDO(
                        $dsn,
                        $this->username,
                        $this->password
                    );

                    $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }catch(PDOException $e){
                    die("Connection error : " . $e->getMessage());
                }
            }


            return $this->conn;
       }
    }
?>