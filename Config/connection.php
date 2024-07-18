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
}

$database = new Database();
$database->connection();

?>