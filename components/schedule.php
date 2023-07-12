<div class="schedule">
            <p><?= $x['username'] ?></p>
            <p><?= $x['inithour']?> horas - <?= $x['endhour'] ?> horas</p>
            <p><?= $x['description'] ?> </p>
            <form action="delete" method="post">
                <input type="hidden" name="id" value="<?= $x['id'] ?>">
                <?php 
                    if(isset($_SESSION['id'])){
                        if($_SESSION['id'] == 1){
                            echo ' <button type="submit" class="btn-all"><i class="bi bi-trash"></i></button>';
                        }else{
                            if($x['supervisor'] == $_SESSION['id']){
                                echo ' <button type="submit" class="btn-all"><i class="bi bi-trash"></i></button>';
                            }
                        }
                        }
                ?>
               
            </form>
</div>