<?php

include "../Config/connection.php";

$id = $_GET['id'];

$result = $database->delete($id);

if($result){
    echo "success";
    header('Location:fetch.php');
    }else{
        echo "error";
}


// if($result){
//     echo"
//     <script>alert('Delete Successfull');
//     window.location.href:fetch.php;
//     </script>
//     ";
// }else{
//     echo"
//     <script>alert('Delete not Successfull');
//     </script>
//     ";   
// }


?>