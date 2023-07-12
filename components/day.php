<form action="scheduling" method="post" class="day">
<input type="hidden" name="day" value="<?= $i ?>">
    <?php 
        if($i < $date){
            echo "<button type=''submit' disabled> $i  </button>";
        }else{
           echo  "<button type='submit'>  $i </button>";
        }
    ?>
</form>

