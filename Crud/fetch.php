<?php

include "../Config/connection.php";

$i = 0;
$result = $database->fetch();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FETCH DATA</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
<h1 class="text-center">FETCH DATA</h1>
<table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>ID</th>
            <th>IMAGE</th>
        </tr>
    </thead>
    <tbody>
        <?php
       foreach($result as $row) :
?>
        <tr>
            <td><?php echo $i++; ?></td>

            <td><?php echo $row['id']; ?></td>
            <td style = "display: flex; align-items: center; gap: 10px;">
                <?php 
                foreach(json_decode($row['image']) as $image) :?>
                <img src="../Images/<?php echo $image; ?>" width="100px" height="100px">
            <?php endforeach;?>

                </td>
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
</body>
</html>