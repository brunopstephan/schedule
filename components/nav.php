<div class="nav">
        
 
    <div class="nav-buttons">

    <?php 
            if(isset($_SESSION['username'])){
                echo 'Bem-vindo(a) '.$_SESSION['username'];
            echo  '<form action="myschedules" method="post">';
            echo  '<button type="submit" class="btn-all"><i class="bi bi-list"></i></button>';
            echo  '<input type="hidden" name="id" value='.$_SESSION['id'].'>';
            echo  '</form>';
            }
        ?>
        <?php 
            if(isset($_SESSION['admin'])){
                if($_SESSION['admin'] == 1){
                    echo '<a class="btn-all" href="admin"><i class="bi bi-gear"></i></a>';
                }
            }
        ?>
        
        <?= !isset($_SESSION['name']) ? "<h2  class='btn-all' id='openLogin'><i class='bi bi-box-arrow-in-right'></i></h2>" 
        : 
        "<a class='btn-all' href='logout'><i class='bi bi-box-arrow-in-left'></i></a>" ?>

        
        
    </div>
</div>