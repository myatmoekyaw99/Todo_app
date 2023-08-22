<?php

require 'config.php';

if($_POST){

    $title = $_POST['title'];
    $desc = $_POST['description'];
    
    $sql = "INSERT INTO todo(title,description) VALUES(:title, :descn)";
    $statement = $pdo->prepare($sql);
    
    $result = $statement->execute(
        array(
        ':title' => $title,
        ':descn' => $desc
        )
    );
}


if($result){
    echo "<script>alert('New Todo is added');
        window.location.href='index.php';
    </script>";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create New</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Create New ToDo</h2>
            <form action="add.php" method="post">
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" id="title" class="form-control" value="" required>
                </div>

                <div class="form-group">
                    <label for="description">Description</label>
                    <textarea name="description" id="description" class="form-control" rows="8" cols="80"></textarea>
                </div>

                <div class="form-group">
                   <input type="submit" value="SUBMIT" name="submit" class="btn btn-primary mt-2">
                   <a href="index.php" class="btn btn-primary mt-2" name="">Back</a>
                </div>
            </form>
           
        </div>
    </div>
</body>
</html>