<?php 
    class Users{
        public $conn;
        public $id_users;
        public $username;
        public $email;
        public $pass;
        public $repass;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){
            $query = "SELECT * FROM tbl_users ORDER BY id_users ASC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function show() {
            $query = "SELECT * FROM tbl_users WHERE id_users = ? LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id_users);
            $stmt->execute();
        
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            $this->id_users = $row['id_users'];
            $this->username = $row['username'];
            $this->email = $row['email'];
            $this->pass = $row['pass'];
            $this->repass = $row['repass'];
        }
        
        public function create(){
            $query = "INSERT INTO tbl_users SET username=:username , email=:email , pass=:pass , repass=:repass ";
            $stmt = $this->conn->prepare($query);
            //clean data
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->pass = htmlspecialchars(strip_tags($this->pass));
            $this->repass = htmlspecialchars(strip_tags($this->repass));

            $stmt->bindParam(':username',$this->username);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':pass',$this->pass);
            $stmt->bindParam(':repass',$this->repass);

            if($stmt->execute()){
                return true;
            }
            printf('Error $s.\n',$stmt->error);
            return false;
        }

        public function update(){
            $query = "UPDATE tbl_users SET username=:username , email=:email , pass=:pass , repass=:repass WHERE id_users=:id_users";
            $stmt = $this->conn->prepare($query);
            //clean data
            $this->id_users = htmlspecialchars(strip_tags($this->id_users));
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->email = htmlspecialchars(strip_tags($this->email));
            $this->pass = htmlspecialchars(strip_tags($this->pass));
            $this->repass = htmlspecialchars(strip_tags($this->repass));

            $stmt->bindParam(':id_users',$this->id_users);
            $stmt->bindParam(':username',$this->username);
            $stmt->bindParam(':email',$this->email);
            $stmt->bindParam(':pass',$this->pass);
            $stmt->bindParam(':repass',$this->repass);
            if($stmt->execute()){
                return true;
            }
            printf('Error $s.\n',$stmt->error);
            return false;
        }

        public function delete(){
            $query = "DELETE FROM tbl_users WHERE id_users=:id_users";
            $stmt = $this->conn->prepare($query);
            $this->id_users = htmlspecialchars(strip_tags($this->id_users));
            $stmt->bindParam(':id_users', $this->id_users);
            if($stmt->execute()){
                return true;
            }
            printf('Error %s.\n', $stmt->error);
            return false;
        }
    }
?>