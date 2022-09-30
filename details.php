<?php
  include('classes.php');
  $search=new searching();
  if(isset($_GET['id']))
  { 
    $data=$search->show($_GET['id']);
    ?>
    <h1><?php echo $data['title']?></h1>
    <p><?php echo $data['description']?></p>
    <a href="index.php">Goback</a>
    <?php
  }

?>	     
