<h1>Meus Agendamentos</h1>
<table>
  <tr>
    <th>Data</th>
    <th>Horário</th>
  </tr>
    <?php 
        $id = $_POST["id"];
        $schedules = getSchedule($id);
        foreach ($schedules as $schedule) {
            echo '<tr>';
            echo '<td>'.$schedule["day"] . "/" . $schedule['month'] .'</td>';
            echo '<td>'.$schedule['inithour'] . " - " . $schedule['endhour'].'</td>';
            echo '</tr>';
        } 
    ?>

</table>
