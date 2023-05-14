<?php 
    class Category{
        public $conn;
        public $id_category;
        public $nameCategory;

        public function __construct($db){
            $this->conn = $db;
        }

        public function read(){
            $query = "SELECT * FROM tbl_category ORDER BY id_category ASC";
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
            return $stmt;
        }

        public function show() {
            $query = "SELECT * FROM tbl_category WHERE id_category = ? LIMIT 1";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(1, $this->id_category);
            $stmt->execute();
        
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            $this->id_category = $row['id_category'];
            $this->nameCategory = $row['nameCategory'];
        }
        
        public function create(){
            $query = "INSERT INTO tbl_category SET nameCategory=:nameCategory ";
            $stmt = $this->conn->prepare($query);
            //clean data
            $this->nameCategory = htmlspecialchars(strip_tags($this->nameCategory));

            $stmt->bindParam(':nameCategory',$this->nameCategory);

            if($stmt->execute()){
                return true;
            }
            printf('Error $s.\n',$stmt->error);
            return false;
        }

        public function update(){
            $query = "UPDATE tbl_category SET nameCategory=:nameCategory WHERE id_category=:id_category";
            $stmt = $this->conn->prepare($query);
            //clean data
            $this->id_category = htmlspecialchars(strip_tags($this->id_category));
            $this->nameCategory = htmlspecialchars(strip_tags($this->nameCategory));

            $stmt->bindParam(':id_category',$this->id_category);
            $stmt->bindParam(':nameCategory',$this->nameCategory);
            if($stmt->execute()){
                return true;
            }
            printf('Error $s.\n',$stmt->error);
            return false;
        }

        public function delete(){
            $query = "DELETE FROM tbl_category WHERE id_category=:id_category";
            $stmt = $this->conn->prepare($query);
            $this->id_category = htmlspecialchars(strip_tags($this->id_category));
            $stmt->bindParam(':id_category', $this->id_category);
            if($stmt->execute()){
                return true;
            }
            printf('Error %s.\n', $stmt->error);
            return false;
        }
    }
?>