<?php 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';

$statement = $pdo->query("SELECT * FROM todo ORDER BY id DESC");

$statement->execute();
$result = $statement->fetchAll();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
    <div class="card">
        <div class="card-body">
            <h2>Todo Home Page</h2>
            <a href="add.php" class="btn btn-info">Create New</a>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Created</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>

                <?php 
                $i = 1;
                if($result) {
                        foreach($result as $value){
                ?>

                    <tr>
                        <td><?= $i;?></td>
                        <td><?= $value['title'];?></td>
                        <td><?= $value['description'];?></td>
                        <td><?= date('Y-m-d',strtotime($value['created_at']));?></td>
                        <td>
                            <a href="edit.php?id=<?= $value['id'];?>" class="btn btn-warning">Edit</a>
                            <a href="delete.php?id=<?= $value['id'];?>" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>

                 <?php 
                        $i++;  
                        }
                    }
                ?>
                   
                
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>


