<?php
    $all = allUsers();

    //register new supervisor
    if(isset($_POST['register'])){
        if(!getUser($_POST['name'])){
            register($_POST['name'], $_POST['password'], $_POST['username']);
        }else{
            echo "Nome de supervisor ja cadastrado.";
        }
    }
?>

<h3>Registrar supervisor:</h3>

<form class="register" action="" method="post">
        <input class="form-input" name="username" placeholder="Nome do supervisor" type="text">
        <input class="form-input" name="name" placeholder="Login do supervisor" type="text">
        <input class="form-input" name="password" placeholder="Senha" type="password">
        <button name="register" class="btn-all" type="submit">Registrar</button>
</form>

<br><br>
<h3>Supervisores</h3>


<table>
  <tr>
    <th>ID</th>
    <th>Login</th>
    <th>Nome</th>
    <th></th>
    <th></th>
  </tr>
  <?php 
    foreach ($all as $supervisor) {
        require("./components/supervisor.php");
    }
?>
</table>



