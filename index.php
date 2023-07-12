<?php 
    session_start();
    //session_destroy();

    
    require_once("./data/dao.php");
    require_once("components/head.php");

    $allDays = allDays();
    $date = new DateTime();
    $date->modify('-5 hours');

    foreach ($allDays as $day) {
        if($date->format('Y-m-d H:i:s') > $day['expire']){
            delete($day['id']);
        }
    }

    require_once("routes.php");

    require_once("components/footer.php");
?>