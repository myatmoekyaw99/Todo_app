<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require 'config.php';

if($_POST){

    $title = $_POST['title'];
    $desc = $_POST['description'];
    $id = $_POST['id'];

    $statement = $pdo->prepare("UPDATE todo SET title='$title',description='$desc' WHERE id=".$id);

    $result = $statement->execute();

    if($result){
        echo "<script>alert('Todo is updated!');
            window.location.href='index.php';
        </script>";
    }

}else{
    $statement = $pdo->prepare("SELECT * FROM todo WHERE id=".$_GET['id']);

    $statement->execute();

    $result = $statement->fetch();

    // echo '<pre>';
    // print_r($result);
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Todo</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Edit ToDo</h2>
            <form action="" method="POST">
                <input type="hidden" name="id" value="<?= $result['id']?>">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="<?= $result['title']?>" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="8" cols="80"><?= $result['description']?></textarea>
                </div>

                <div class="form-group">
                   <input type="submit" value="Update" name="submit" class="btn btn-primary mt-2">
                   <a href="index.php" class="btn btn-primary mt-2" name="">Back</a>
                </div>
            </form>
           
        </div>
    </div>
</body>
</html>