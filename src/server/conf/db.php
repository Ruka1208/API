<?php 
    class db{
        private $serverName = "localhost";
        private $username = "root";
        private $password = "";
        private $db = "be";
        private $conn;
        public function connect(){
            $this->conn = null;
            try {
                $this->conn = new PDO("mysql:host=".$this->serverName.";dbname=".$this->db."", $this->username, $this->password);
                // set the PDO error mode to exception
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                // echo "Connected successfully";
            } 
            catch(PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
            return $this->conn;
        }
    };
?>