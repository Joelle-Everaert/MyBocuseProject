<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="normalize.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="calendrier.css">
    <script src="https://kit.fontawesome.com/08f226ae60.js" crossorigin="anonymous"></script>
</head>

<body>
    <nav class="topnav">
        <a class="logo" href=""><img src="./assets/img/logo.png" alt="" width="25px" height="18px"
                style="filter: invert();">MyBocuse</a>

        <a href="#"><i class="fas fa-sign-out-alt"></i> Logout</a>
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
            <button class="addEventButton">Add an event</button>
        </div>
    </div>


    <script src="./js/calendrier.js"></script>
</body>

</html>