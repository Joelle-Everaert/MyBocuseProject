<?php
session_start();

include('../secret.php');

// requete pour recupérer recette liste

try{
    $bdd= new PDO("mysql:host=localhost;dbname=MyBocus;charset=utf8", $user, $pwd, [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
}
catch (Exception $e)
{
die('Erreur : ' . $e->getMessage());
}

// /!!\ Changement today

    $requestAttendanceUser = $bdd->prepare('SELECT date, attendance_morning, attendance_evening FROM attendanceTimes WHERE fk_id_user = ?');
    $requestAttendanceUser->execute(array($_SESSION['idUser']));

    $requestRecipeUser = $bdd->prepare('SELECT date, title_watch, description FROM watch_recipe WHERE FK_id_user = ?');
    $requestRecipeUser->execute(array($_SESSION['idUser']));
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MyBocuse-Profile</title>
    <link rel="stylesheet" href="../css/normalize.css">
    <link rel="stylesheet" href="../css/style.css">
    <script src="https://kit.fontawesome.com/08f226ae60.js" crossorigin="anonymous"></script>
</head>

<body class="profileBody">
<?php
    include("../php/smallScreen.php");
?> 
    <!-- ======================= NAVBAR ============================================= -->
    <nav class="topnav">
        <a class="logo" href="../index.php"><img src="../assets/img/logo.png" alt="" width="25px" height="18px"
                style="filter: invert();">MyBocuse</a>
        <a href="./logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
        </div>
    </nav>

    <h2 class="profileName"><i class="fas fa-user"></i> <?php echo $_SESSION['name']. " " .$_SESSION['surname'];?> </h2>
    <section class="contenuProfil">
        <div class="profileHeader">

            <div class="profile-pic-div">
                <img src="../assets/img/image.jpg" id="photo">
                <input type="file" id="file">
                <label for="file" id="uploadBtn">Choose Photo</label>
            </div>
        </div>
        <span class="traitgauche" style="margin-top:35px;"></span>
        <div class="profileInformations">
            <div class="infos">
                <h3>Age</h3>
                <h3>Promo</h3>
                <h3>Phone</h3>
                <h3>Email</h3>
                <div class="reseaux">
                    <span>Social medias <br></span>
                    <a href="#"><i class="fab fa-2x fa-instagram-square insta"></i></a>
                    <a href="#"><i class="fab fa-2x fa-facebook-square facebook"></i></a>
                    <a href="#"><i class="fab fa-2x fa-linkedin linkedin"></i></a>
                </div>
            </div>
            <?php
    $birthday = $_SESSION['birthday'];
    $day = date("Y-m-d");
    $diff = date_diff(date_create($birthday), date_create($day));
?>
            <div class="profileContent">
                <h3><?php echo $diff->format('%y')?> ans</h3>
                <h3><?php echo $_SESSION['promo']?></h3>
                <h3>+32 000 00 00</h3>
                <h3> <?php echo $_SESSION['email']?></h3>
            </div>
        </div>
    </section>
    <hr>

        <?php

        if($_SESSION['account_type'] == 'student'){
        include('./presenceRecettes.php');        
        } 
        ?>
    
    <?php
    include("../php/footer.php");
?>
    <script src="../js/edit.js"></script>
    <script src="../js/addProfilePic.js"></script>
</body>

</html>