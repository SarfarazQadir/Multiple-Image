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
    public function edit($id){
        $query = "SELECT * FROM `images` WHERE id= $id";
        $result = mysqli_query($this->conn, $query);
        if($result){
            return $result;
            }else{
                return false;
                }
    }
    public function update($id,$folder){
        $query = "UPDATE `images` SET `image`='$folder' WHERE id = $id";
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