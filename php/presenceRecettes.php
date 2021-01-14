<section class="Contenu_Presence_recette">
        
        <div class="attendanceLearnersHistory">
            <h2>Attendances</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Attendance Morning</th>
                    <th>Attendance Evening</th>
                </tr>
                <?php
                while ($answerAttendancesUser = $requestAttendanceUser->fetch()) {
                echo 
                "<tr>
                    <td>" . $answerAttendancesUser['date']. "</td>
                    <td>" . $answerAttendancesUser['attendance_morning'] . "</td>
                    <td>" . $answerAttendancesUser['attendance_evening'] . "</td>
                </tr>" ;
                };
                ?>

            </table>

        </div>

        <div class="recipeLearnersHistory">
            <h2>Recipes history</h2>
            <table>
                <tr>
                    <th>Date</th>
                    <th>Title recipe</th>
                    <th>Description</th>
                </tr>
                <?php
        while ($answerRecipeUser = $requestRecipeUser->fetch()) {
            echo "<tr>
        <td>" . $answerRecipeUser['date']. "</td>
        <td>" . $answerRecipeUser['title_watch'] . "</td>
        <td>" . $answerRecipeUser['description'] . "</td>
        </tr>" ;
        };
        
        ?>
            </table>
        </div>
    </section>