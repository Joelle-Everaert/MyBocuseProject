<?php
session_start();

include('secret.php');


    try{
        $bdd= new PDO("mysql:host=localhost;dbname=MyBocus;charset=utf8", "$user", "$pwd", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
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
</head>

<body>
    
<button class="addWatch">Add a recipe</button>

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
    <script src="pointage.js"></script>
    
<?php
}
?>

</body>
<!-- titre - date - explication -->
<script src="pointage.js"></script>
</html>