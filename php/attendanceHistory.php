<?php
try {
    $bdd = new PDO("mysql:host=localhost;dbname=MyBocus;charset=utf8", "$user", "$pwd", [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

// /!!\ Changement today

    $requestAttendances = $bdd->prepare('SELECT fk_id_user, attendance_morning, attendance_evening FROM attendanceTimes WHERE date=?');
    $requestAttendances->execute(array($_SESSION['today']));

?>

    <div class="attendanceHistory">
        <table>
            <tr>
                <th>Firstname</th>
                <th>Attendance Morning</th>
                <th>Attendance Evening</th>
            </tr>
        <?php
        while ($answerDailyAttendances = $requestAttendances->fetch()) {
            $requestName = $bdd->prepare('SELECT surname FROM Students WHERE id_user=?');
            $requestName->execute(array($answerDailyAttendances['fk_id_user']));
            $answerUserId = $requestName->fetch();
            echo "<tr>
     <td>" . $answerUserId['surname'] . "</td>
    <td>" . $answerDailyAttendances['attendance_morning'] . "</td>
    <td>" . $answerDailyAttendances['attendance_evening'] . "</td>
  </tr>" ;
        };
    
        ?>
        </table>
    </div>