<?php
require 'config.php';

$statement = $pdo->prepare("DELETE FROM todo WHERE id=".$_GET['id']);

$statement->execute();

header('location: index.php');


?>