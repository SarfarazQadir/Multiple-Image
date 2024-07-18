<?php

include "../Config/connection.php";

if(isset($_POST['btnsubmit'])){
    $countimage = count($_FILES['image']['name']);
    $folder = array();

    for($i = 0; $i < $countimage; $i++){
        $image = $_FILES['image']['name'][$i];
        $tmp = $_FILES['image']['tmp_name'][$i];

        $extension = explode('.',$image);
        $extension = strtolower(end($extension));

        $uniq = uniqid().'.'. $extension;
        move_uploaded_file($tmp,"../Images/".$image);
        $folder[] = $uniq;
    
    }

    $folder = json_encode($folder);
    $result = $database->insert($folder);
    if($result){
        echo "<script>alert('Data Inserted');
        window.location.href='index.php'</script>";
    }else{
        echo "<script>alert('Data not Inserted')</script>;";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Multiple Image</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
<h1>Multiple Image</h1>
<form method="post" enctype="multipart/form-data">
    <input type="file" class="btn btn-warning" multiple accept=".jpg, .jpeg, .png" name="image[]" ><br><br>
    <input class="btn btn-success" type="submit" name="btnsubmit" value="Add">
</form>
</body>
</html>