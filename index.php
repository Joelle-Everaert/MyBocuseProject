<?php 
session_start();

//----------------------BASE DE DONNEE COONEXION-----------------------------
include('secret.php');


    try{
        $bdd= new PDO("mysql:host=localhost;dbname=mybocuse;charset=utf8", "$user", "$pwd", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
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
    <title>MyBocuse</title>
    <link rel="stylesheet" href="./css/normalize.css">
    <link rel="stylesheet" href="./css/style.css">
</head>

<body id="loginpage">
<?php
    include("./php/smallScreen.php");
    ?>
    <section class="header">
        <div class="logincontainer">
            <div class="titre_soustitre">
                <h1 class="titre">Welcome to your MyBocuse space</h1>
            </div>

<?php

if(isset($_POST['email']) && isset($_POST['password'])){
    $request = $bdd->prepare('SELECT email, password, account_type, name, surname, birthday, promo FROM Students WHERE email = ?') or die(print_r($bdd->errorInfo()));
    $request->execute([
        $_POST['email']  
    ]);
    $data = $request->fetch(); 
                
    if(!empty($data)){
        if(password_verify($_POST['password'], $data['password'])){ // attention
            $_SESSION['SessionOK'] = true;
            $_SESSION['email'] = $data['email'];
            $_SESSION['account_type'] = $data['account_type'];
            $_SESSION['name'] = $data['name'];
            $_SESSION['surname'] = $data['surname'];
            $_SESSION['birthday'] =$data['birthday'];
            $_SESSION['promo'] = $data['promo'];
            $_SESSION['today'] = date("Y-m-d");
        }
    }
}

if($_SESSION){
    header("Location: ./welcome.php");

}else{
    include("./php/loginForm.php");
}

?>

        </div>
            <div class="imagelogin">
                <img src="./assets/img/loginimage.jpg" alt="">
            </div>
            
    </section>
<?php
    include("./php/footer.php");
?>

</body>

</html>