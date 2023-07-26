<?php 

    $date = date('d');
    $month = date('m');
    for ($i=0; $i < 25; $i++) { 
        $hours[$i] = "NO";
    }
?>



<div id="login" class="login">
    <h1>Login</h1>
    <?php
    
    if(isset($_POST['login'])){
        if($user = getUser($_POST['name'])){
            if(password_verify($_POST['password'], $user['password'])){
                $_SESSION['name'] = $user['name'];
                $_SESSION['username'] = $user['username'];
                $_SESSION['admin'] = $user['admin'];  
                $_SESSION['id'] = $user['id'];  
                $_SESSION['logged'] = 1;   
                echo "<script>location.href = './'</script>";
            }else{  
                echo "<script>
            alert('Usuário ou senha incorretos');location.href='./';
            </script>";
            }
        }else{
            echo "<script>
            alert('Usuário ou senha incorretos');location.href='./';
            </script>";
        }
    }

    ?>
    <form action="" method="post">
        <input class="form-input" name="name" placeholder="Login do supervisor" type="text">
        <input class="form-input" name="password" placeholder="Senha" type="password">
        <button name="login" class="btn-all" type="submit">Entrar</button>
        <h1 id="closeLogin"><i class="bi bi-x"></i></h1>
    </form>
</div>
<div class="calendar">
    <?php 
    if($month == 4 || $month == 6 || $month == 9 || $month == 11){
        for ($i=1; $i < 31; $i++) { 
            require("./components/day.php");
        }
    }else if($month == 1 || $month == 3 || $month == 5 || $month == 7 || $month == 8 || $month == 10 || $month == 12){
        for ($i=1; $i < 32; $i++) { 
            require("./components/day.php");
        }
    }else{
        for ($i=1; $i < 29; $i++) { 
            require("./components/day.php");
        }
    }
    ?>
</div>