<?php

include "../Config/connection.php";

$id = $_GET['id'];

$result = $database->delete($id);


?>