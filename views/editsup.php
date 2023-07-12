<?php
    $name = $_POST['name'];

    $sup = getUser($name);
    if(isset($_POST['edit'])){
        if($_POST['password'] == ""){
            updateSup($_POST['id'], $_POST['username'], $_POST['name1'], $_POST['password1']);
            //echo $_POST['id'] . ' ' . $_POST['username'] . ' ' . $_POST['name1'] . ' ' . $_POST['password1'];
        }else{
            updateSup($_POST['id'], $_POST['username'], $_POST['name1'], password_hash($_POST['password'], PASSWORD_DEFAULT));
            //echo $_POST['id'] . ' ' . $_POST['username'] . ' ' . $_POST['name1'] . ' ' . password_hash($_POST['password'], PASSWORD_DEFAULT);
        }
    }
?>

<h1>Editando <?= $sup['username'] ?></h1>

<form class="register" action="" method="post">
        <input class="form-input" name="username" placeholder="Nome do supervisor" type="text" value="<?= $sup['username'] ?>">
        <input class="form-input" name="name1" placeholder="Login do supervisor" type="text" value="<?= $sup['name'] ?>">
        <input class="form-input" name="password" placeholder="Nova senha" type="password">
        <input type="hidden" name="password1" value="<?= $sup['password'] ?>">
        <input type="hidden" name="id" value="<?= $sup['id'] ?>">
        <button name="edit" class="btn-all" type="submit">Editar</button>
</form>