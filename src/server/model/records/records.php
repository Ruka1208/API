<?php 
    class Records{
        public $conn;
        public $id_records;
        public $username;
        public $img;
        public $age;
        public $cmnd;
        public $phone;
        public $note;
        public $date_create;
        public $id_users;

        public $address;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){
            $query = "SELECT * FROM tbl_treatment_records ORDER BY id_records ASC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function show() {
            $query = "SELECT * FROM tbl_treatment_records WHERE id_records = ? LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id_records);
            $stmt->execute();
        
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            $this->id_records = $row['id_records'];
            $this->username = $row['username'];
            $this->img = $row['img'];
            $this->age = $row['age'];
            $this->cmnd = $row['cmnd'];
            $this->phone = $row['phone'];
            $this->note = $row['note'];
            $this->date_create = $row['date_create'];
            $this->address = $row['address'];
        }
        
        public function create(){
            $query = "INSERT INTO tbl_treatment_records SET username=:username, img=:img, age=:age, cmnd=:cmnd, phone=:phone, note=:note, date_create=:date_create, address=:address";

            $stmt = $this->conn->prepare($query);
            //clean data
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->img = htmlspecialchars(strip_tags($this->img));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->cmnd = htmlspecialchars(strip_tags($this->cmnd));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->note = htmlspecialchars(strip_tags($this->note));
            $this->date_create = htmlspecialchars(strip_tags($this->date_create));
            $this->address = htmlspecialchars(strip_tags($this->address));

            $stmt->bindParam(':username',$this->username);
            $stmt->bindParam(':img',$this->img);
            $stmt->bindParam(':age',$this->age);
            $stmt->bindParam(':cmnd',$this->cmnd);
            $stmt->bindParam(':phone',$this->phone);
            $stmt->bindParam(':note',$this->note);
            $stmt->bindParam(':date_create',$this->date_create);
            $stmt->bindParam(':address',$this->address);

            if($stmt->execute()){
                return true;
            }
            printf('Error $s.\n',$stmt->error);
            return false;
        }

        public function update(){
            $query = "UPDATE tbl_treatment_records SET username=:username, img=:img, age=:age, cmnd=:cmnd, phone=:phone, note=:note, date_create=:date_create, address=:address WHERE id_records=:id_records";
            $stmt = $this->conn->prepare($query);
            //clean data
            $this->id_records = htmlspecialchars(strip_tags($this->id_records));
            $this->username = htmlspecialchars(strip_tags($this->username));
            $this->img = htmlspecialchars(strip_tags($this->img));
            $this->age = htmlspecialchars(strip_tags($this->age));
            $this->cmnd = htmlspecialchars(strip_tags($this->cmnd));
            $this->phone = htmlspecialchars(strip_tags($this->phone));
            $this->note = htmlspecialchars(strip_tags($this->note));
            $this->date_create = htmlspecialchars(strip_tags($this->date_create));
            $this->address = htmlspecialchars(strip_tags($this->address));

            $stmt->bindParam(':id_records',$this->id_records);
            $stmt->bindParam(':username',$this->username);
            $stmt->bindParam(':img',$this->img);
            $stmt->bindParam(':age',$this->age);
            $stmt->bindParam(':cmnd',$this->cmnd);
            $stmt->bindParam(':phone',$this->phone);
            $stmt->bindParam(':note',$this->note);
            $stmt->bindParam(':date_create',$this->date_create);
            $stmt->bindParam(':address',$this->address);
            if($stmt->execute()){
                return true;
            }
            printf('Error $s.\n',$stmt->error);
            return false;
        }

        public function delete(){
            $query = "DELETE FROM tbl_treatment_records WHERE id_records=:id_records";
            $stmt = $this->conn->prepare($query);
            $this->id_records = htmlspecialchars(strip_tags($this->id_records));
            $stmt->bindParam(':id_records', $this->id_records);
            if($stmt->execute()){
                return true;
            }
            printf('Error %s.\n', $stmt->error);
            return false;
        }
    }
?>