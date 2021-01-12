<?php

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <button class="addWatch">
        add a watch
    </button>
    <div class="form-popup" id="myForm" style="display:none">
        <form action="/action_page.php" class="form-container">
            <h1>Add a watch</h1>

            <label for="email"><b>Email</b></label>
            <input type="text" placeholder="Enter Email" name="email" required>

            <label for="psw"><b>Password</b></label>
            <input type="password" placeholder="Enter Password" name="psw" required>

            <button type="submit" class="btn">Login</button>
            <button type="submit" class="btn cancel" onclick="closeForm()">Close</button>
        </form>
    </div>
    <script>
        let button = document.querySelector(".addWatch");
        let form = document.querySelector(".form-popup");
        console.log('button:', button)

        button.addEventListener("click", function(e) {
            form.style.display = "block";
        })
    </script>
</body>

</html>