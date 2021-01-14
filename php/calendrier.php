<?php
session_start();

include('../secret.php');

try{
    $bdd= new PDO("mysql:host=127.0.0.1:3306;dbname=uaanzmse_mybocus;charset=utf8", $user, $pwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/calendrier.css">
    <script src="https://kit.fontawesome.com/08f226ae60.js" crossorigin="anonymous"></script>
</head>
<body>
<?php
    include("../php/smallScreen.php");
    ?>
    <nav class="topnav">
        <a class="logo" href="../index.php"><img src="../assets/img/logo.png" alt="" width="25px" height="18px"
                style="filter: invert();">MyBocuse</a>
        <a href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <a href="./profil.php"><i class="fas fa-user"></i></i> Profile</a>
        </div>
    </nav>
    <div class="calendarTitle">
        <h1>Calendar</h1>
        <h2>add a recipe by clicking on the button</h2>
    </div>
    <div class="contenaireCalendrier">
        <div class="calendrier">
            <div class="mois">
                <i class="fas fa-angle-left prev"></i>
                <div class="date">
                    <h1></h1>
                    <p></p>
                </div>
                <i class="fas fa-angle-right next"></i>
            </div>
            <div class="joursSemaine">
                <div>Sun</div>
                <div>Mon</div>
                <div>Tue</div>
                <div>Wed</div>
                <div>Thu</div>
                <div>Fri</div>
                <div>Sat</div>
            </div>
            <div class="jours"></div>
        </div>
        <div class="contenaireEvetButton">
            <button class="addEventButton">Add a recipe</button>
        </div>
    </div>
    
</body>
</html>

<?php
// Recupéré session de calendrier
    $req = $bdd->prepare('SELECT id_user FROM Students WHERE email = ?');
    $req->execute([
        $_SESSION['email']
    ]);
    $data = $req->fetch(); 

    $req-> closeCursor();  

    $_SESSION['idUser'] = $data['id_user'];

if(!empty($_POST['title_watch']) && !empty($_POST['date']) && !empty($_POST['description'])){
    $req = $bdd->prepare('INSERT INTO watch_recipe (FK_id_user, title_watch, date, description) VALUES (?, ?, ?, ?)') or die(print_r($bdd->errorInfo()));
    $req->execute([
        $_SESSION['idUser'],
        strip_tags(trim($_POST['title_watch'])),
        strip_tags(trim($_POST['date'])),
        strip_tags(trim($_POST['description'])),
    ]);
    $req-> closeCursor();  
?>

    <h1> C'est encoder ;-)</h1>

<?php 
    
}else{
?> 

    <div class="form-popup" id="myForm" style="display:none">
        <form action="" method="POST">
            <h1>Add a watch</h1>

            <label for="email">Title</label>
            <input type="text" placeholder="Title" name="title_watch">

            <label for="date">Date</label>
            <input type="date" placeholder="Enter Password" name="date">

            <label for="explication">Recipe description</label>
            <textarea placeholder="Enter a brief description" name="description"></textarea>

            <button type="submit" class="btn">Enter</button>
        </form>
    </div>
    
    
<?php
}
?>
<script src="../js/calendrier.js"></script>
<script src="../js/recipe.js"></script>
</body>

</html>