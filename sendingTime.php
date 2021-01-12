<?php
include('./secrets.php');
try {
    $bdd = new PDO("mysql:host=localhost;dbname=MyBocuse;charset=utf8", $user, $userpwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

$today = date("Y-m-d");
$currentTime = date("H:i:s");

if (!empty($_POST['cleMorning'])){
$requestAttendanceMorning = $bdd->prepare('INSERT INTO attendanceTimes(date, attendance_morning) VALUES(?,?)'); 
$requestAttendanceMorning->execute(array($today, $currentTime));
}

if (!empty($_POST['cleEvening'])) {
    $requestAttendanceEvening = $bdd->prepare('UPDATE attendanceTimes SET attendance_evening=? WHERE id_time="21"');

    $requestAttendanceEvening->execute(array($currentTime));

    // $requestAttendanceTime = $bdd->query('UPDATE attendanceTimes SET attendanceMorning WHERE id_time="7"'); 
}
// date("Y-m-d H:i:s"); 

// if (isset($_POST["possesseur"]) && isset($_POST["nom"])) {
//     $bdd = new PDO('mysql:host=localhost;dbname=test;charset=utf8', 'jean', 'Jean/PhpMA1435', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
//     $request = $bdd->prepare('INSERT INTO jeux_video(nom,possesseur) VALUES(?,?)'); // could add OR possesseur="florent" ORDER BY possesseur DESC LIMIT 5 at the end of the search
//     $request->execute(array($_POST["nom"], $_POST["possesseur"]));

// UPDATE `attendanceTimes` SET `id`=[value-1],`id_student`=[value-2],`date`=[value-3],`attendanceMorning`=[value-4],`attendanceEvening`=[value-5] WHERE 1
// }

?>