<?php
include "../Config/connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = $database->fetchById($id);
    $currentImages = json_decode($row['image']);
}

if (isset($_POST['btnupdate'])) {
    $id = $_POST['id'];
    $newImages = $_FILES['image']['name'][0] != "" ? true : false;

    if ($newImages) {
        $countimage = count($_FILES['image']['name']);
        $folder = array();

        for ($i = 0; $i < $countimage; $i++) {
            $image = $_FILES['image']['name'][$i];
            $tmp = $_FILES['image']['tmp_name'][$i];

            $extension = explode('.', $image);
            $extension = strtolower(end($extension));

            $uniq = uniqid() . '.' . $extension;
            move_uploaded_file($tmp, "../Images/" . $uniq);
            $folder[] = $uniq;
        }

        $folder = json_encode($folder);
    } else {
        $folder = json_encode($currentImages);
    }

    $result = $database->update($id, $folder);
    if ($result) {
        echo "<script>alert('Data Updated');
        window.location.href='fetch.php'</script>";
    } else {
        echo "<script>alert('Data not Updated')</script>;";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Data</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js" integrity="sha384-oesi62hOLfzrys4LxRF63OJCXdXDipiYWBnvTl9Y9/TRlw5xlKIEHpNyvvDShgf/" crossorigin="anonymous"></script>
</head>
<body>
<h1 class="text-center">Update Data</h1>
<form method="post" enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <div class="form-group">
        <label>Current Images:</label>
        <div style="display: flex; gap: 10px;">
            <?php foreach ($currentImages as $image) : ?>
                <img src="../Images/<?php echo $image; ?>" width="100px" height="100px">
            <?php endforeach; ?>
        </div>
    </div>
    <div class="form-group">
        <label for="image">Update Images:</label>
        <input type="file" class="btn btn-warning" multiple accept=".jpg, .jpeg, .png" name="image[]" ><br><br>
    </div>
    <input class="btn btn-success" type="submit" name="btnupdate" value="Update">
</form>
</body>
</html>
