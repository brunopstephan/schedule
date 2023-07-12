<?php 

    $route = $_GET['url'] ?? '/';
    if(isset($_SESSION['logged'])){
        $logged = $_SESSION['logged'];    
    }

    if(isset($_SESSION['admin'])){
        $admin = $_SESSION['admin'];
    }



    switch ($route) {
        case '/':
            include_once("./views/home.php");
            break;

        case 'scheduling':
                include_once("./views/scheduling.php");
                break; 

        case 'logout':
           if($logged == 1){
                session_destroy();
                header('Location: http://localhost/php/schedule/'); 
                break;
           }else{
                header('Location: http://localhost/php/schedule/'); 
                break;
           }

        case 'delete':
            if($logged == 1){
                delete($_POST['id']);
                header('Location: http://localhost/php/schedule/'); 
                break;
           }else{
                header('Location: http://localhost/php/schedule/'); 
                break;
           }

           case 'deletesup':
            if($admin == 1){
                deleteBySupId($_POST['supId']);
                deleteSup($_POST['supId']);
                header('Location: http://localhost/php/schedule/admin'); 
                break;
           }

           case 'admin':
            if($admin == 1){
                include_once("./views/admin.php");
                break;
           }else{
                header('Location: http://localhost/php/schedule/'); 
                break;
           }

           case 'editsup':
            if($admin == 1){
                include_once("./views/editsup.php");
                break;
           }else{
                header('Location: http://localhost/php/schedule/'); 
                break;
           }

           case 'myschedules':
            if($logged == 1){
                include_once("./views/myschedules.php");
                break;
           }else{
                header('Location: http://localhost/php/schedule/'); 
                break;
           }


        
        default:
            echo "Rota não encontrada";
            break;
    }

?>