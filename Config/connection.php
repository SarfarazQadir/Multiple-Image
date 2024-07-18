<?php

class Database{

    private $conn;

    public function connection(){
        $this->conn = mysqli_connect("localhost","root","","crud_db");
    }
    public function insert($folder){
        $query = "INSERT INTO `images`(`image`) VALUES ('$folder')";
        $result = mysqli_query($this->conn, $query);
        if($result){
            return $result;
        }else{
            return false;
        }
    }
    public function fetch(){
        $query = "SELECT * FROM `images`";
        $result = mysqli_query($this->conn, $query);
        if($result){
            return $result;
            }else{
                return false;
                }
    }
    public function delete($id){
        $query = "DELETE FROM `images` WHERE `id` = '$id'";
        $result = mysqli_query($this->conn, $query);
        if($result){
            return $result;
            }else{
                return false;
                }
    }
    public function fetchById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM images WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function update($id, $images) {
        $stmt = $this->conn->prepare("UPDATE images SET image = ? WHERE id = ?");
        $stmt->bind_param("si", $images, $id);
        return $stmt->execute();
    }
}

$database = new Database();
$database->connection();

?>