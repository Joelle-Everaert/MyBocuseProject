<?php
session_start();

include('../secret.php');

try{
    $bdd= new PDO("mysql:host=localhost;dbname=MyBocus;charset=utf8", $user, $pwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}


// /!!\ Changement today
// $today = date("Y-m-d");

$currentTime = date("H:i:s");

if (!empty($_POST['cleMorning'])){
$requestAttendanceMorning = $bdd->prepare('INSERT INTO attendanceTimes(fk_id_user, date, attendance_morning) VALUES(?,?,?)'); 
$requestAttendanceMorning->execute(array($_SESSION['idUser'],$_SESSION['today'], $currentTime));
}

if (!empty($_POST['cleEvening'])) {
    $requestAttendanceEvening = $bdd->prepare('UPDATE attendanceTimes SET attendance_evening=? WHERE fk_id_user = ? && date = ?');

    $requestAttendanceEvening->execute(array($currentTime, $_SESSION['idUser'],$_SESSION['today']));

    
}

//  upload image --> utlisation superglobal $_FILES 
// recupéré fichier dans un dossier sur server
// bdd stocker le chemain vers le fichier de notre server
?>
