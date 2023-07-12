<?php 


    $day = getDay($_POST['day']);

    $date = new DateTime();
    $date->modify('-5 hours');
    $date->format('H');
     //2023-month-day endhour:00:00

    if(isset($_POST['action'])){
        if(isset($_SESSION['logged'])){
            $expireDate = date('Y').'-'.date('m').'-'.$_POST['day'].' '.$_POST['endhour'].':00:00';
            insert($_POST['day'], $_POST['inithour'], $_POST['endhour'], date('m'), $_POST['description'], $_SESSION['id'], $expireDate, date('Y'));
            
        }else{
            echo "<script>
            alert('Você não tem permissão para agendar ou não está autenticado')
            </script>"; 
        }
    }

?>


<h1><?= $_POST['day']. '/' . date('m') ?></h1>
<div class="scheduling-form">

    <form action="" method="post">
        <input type="hidden" name="day" value="<?= $_POST['day'] ?>">
        <select name="inithour" id="inithour">
            <option value="">Selecione a hora de inicio</option>
        <?php 
            for ($hour=0; $hour < 24; $hour++) { 
                if($hour < $date->format('H')){
                    echo '<option value="'.$hour.'" id="'.$hour.'" disabled>'.$hour.'</option>';
                }else{
                    echo '<option value="'.$hour.'" id="'.$hour.'">'.$hour.'</option>';
                }
            }
        ?>
        </select>
        <select name="endhour" id="endhour">
            <option value="">Selecione a hora de término</option>
        <?php 
            for ($hour=0; $hour < 24; $hour++) { 
                
                echo '<option value="'.$hour.'" id="'.$hour.'">'.$hour.'</option>';
            }
        ?>
        </select>
        <input class="description" name="description" type="text" placeholder="Descrição">
        <button type="submit" name="action">Agendar</button>
    
    </form>
</div>
   <div class="schedules">
        <h3>Agendamentos</h3>
        <?php 
        foreach ($day as $x) {
            require("./components/schedule.php");
        }
        ?>
   </div>
</div>
