<?php
// On doit lié notre page user quelque part dans notre site pour reload a chaque entrée ainsi --> envoi vers bdd liée e,suite l'enlever et gitignore le fichier exemple : <a href="user.php">TEST</a> pour accéder à la page php et la reload

include('secret.php');


    try{
        $bdd= new PDO("mysql:host=localhost;dbname=MyBocus;charset=utf8", "$user", "$pwd", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
    }
    catch (Exception $e)
    {
    die('Erreur : ' . $e->getMessage());
}

$password = 'Kill2021';
$hashed_password = password_hash($password, PASSWORD_DEFAULT);
$sql =$bdd->prepare ( "INSERT INTO Students (name, surname, email, password, account_type, picture_link)
VALUES ('Coach', 'Kill', 'kill_coach@mybocus.org', ? , 'chef', 'https://images.theconversation.com/files/319652/original/file-20200310-61148-vllmgm.jpg?ixlib=rb-1.1.0&q=45&auto=format&w=600&h=400&fit=crop&dpr=1')");

$sql->execute(array($hashed_password));

?>