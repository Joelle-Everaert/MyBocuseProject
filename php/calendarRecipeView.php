<?php
session_start();

include('../secret.php');

try{
    $bdd= new PDO("mysql:host=localhost;dbname=uaanzmse_mybocus;charset=utf8", $user, $pwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

$arrayRecipeDate = [];
if (!empty($_POST['cleGetCalendarRecipeView'])){
$requestRecipeDates = $bdd->prepare('SELECT date FROM watch_recipe');
$requestRecipeDates->execute();
while ($answerRecipeDates = $requestRecipeDates->fetch()) {
echo $answerRecipeDates['date'].",";
// $arrayRecipeDate[] = $answerRecipeDates['date'];

}
}
// $js_array = json_encode($arrayRecipeDate);
// echo $js_array;
// echo $arrayRecipeDate;

// print_r($arrayRecipeDate);


// echo "
// <div>
//     <p>Recipe done by</p>
//     <p>Recipe title</p>
//     <p>Description</p>

// </div>"
?>