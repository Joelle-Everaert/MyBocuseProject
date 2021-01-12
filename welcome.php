<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>c'est ok </p>
    <button><a href="logout.php">LOG OUT</a></button>

    <button class="addWatch">Add a watch</button>


<?php

    include('secret.php');

    try{
        $bdd= new PDO("mysql:host=localhost;dbname=MyBocus;charset=utf8", "$user", "$pwd", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    catch (Exception $e)
    {
    die('Erreur : ' . $e->getMessage());
}

?>
</body>
</html>