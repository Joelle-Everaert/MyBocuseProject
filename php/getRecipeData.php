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
if (!empty($_POST['securedGetCalendarRecipeContent'])){
$requestRecipeData = $bdd->prepare('SELECT title_watch,description, FK_id_user FROM watch_recipe WHERE date=?');
$requestRecipeData->execute(array($_POST['securedGetCalendarRecipeContent']));
$answerRecipeDates = $requestRecipeData->fetch();

$requestNameUserRecipe = $bdd->prepare('SELECT surname FROM Students WHERE id_user=?');
$requestNameUserRecipe->execute(array($answerRecipeDates['FK_id_user']));
$answerUserIdRecipe = $requestNameUserRecipe->fetch();

// echo $answerRecipeDates['title_watch'] . "," . $answerRecipeDates['description'] . "," . $answerUserIdRecipe['surname'];

echo "
<div>
    <p>Recipe done by</p>
    <p>". $answerUserIdRecipe['surname'] ."</p>
    <p>Recipe title</p>
    <p>". $answerRecipeDates['title_watch'] ."</p>
    <p>Description</p>
    <p>". $answerRecipeDates['description'] ."</p>
</div>";
}
?>