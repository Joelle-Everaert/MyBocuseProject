<?php
session_start();

include('secret.php');

try{
    $bdd= new PDO("mysql:host=localhost;dbname=uaanzmse_mybocus;charset=utf8", $user, $pwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
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
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/08f226ae60.js" crossorigin="anonymous"></script>

    <title>MyBocus</title>
</head>

<body>

<?php
    include("./php/smallScreen.php");
?>
    <!-- ======================= NAVBAR ============================================= -->
    <nav class="topnav">
        <a class="logo" href="../index.php"><img src="./assets/img/logo.png" alt="" width="25px" height="18px"
                style="filter: invert();">MyBocuse</a>
        <a href="./php/logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        <a href="./php/profil.php"><i class="fas fa-user"></i></i> Profile</a>
        </div>
    </nav>

    <h2 class="welcomeName"><i class="fas fa-user"></i> <?php echo $_SESSION['name']. " " .$_SESSION['surname'];?> </h2>

    <div class="welcomeHeader">
        <div class="welcomesubheader1">
            <?php

            if($_SESSION['account_type'] == 'student'){
            include('./php/pointage.php');        
            } else if ($_SESSION['account_type'] == 'chef') {
            include('./php/attendanceHistory.php');
            }    
            ?>
        </div>

        <span class="welcomeTraitgauche" style="margin-top:30px;"></span>

        <div class="buttonsAndModal">
            <div class="welcomesubheader2">

                <button class="viewCalendarButton"><a href="./php/calendrier.php">View calendar<a></button>
                <button class="addEventButton">Add a recipe</button>

            </div>
            <?php
            // Recupéré session de add a recipe
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
            $title_recipe = $_POST['title_watch'];
            $req-> closeCursor();  

            echo "<h4 style='color:white;text-align:center;'> Ta recette \" ". $title_recipe ." \" est enrigistrée </h4>";
            ?>

            <?php 
            }else{
            ?>

                <div class="form-popup" id="myForm" style="display:none">
                    <form class = "formContent" action="" method="POST">

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
        </div>
    </div>

    <?php
    include("./php/footer.php");
?>
    <script src="./js/recipe.js"></script>
    <script src="./js/pointage.js"></script>
</body>

</html>