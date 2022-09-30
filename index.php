
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">	
    <title></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./css/style.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-white bg-white p-4" style="border-bottom: 1px solid #ebebeb;">
        <img src="img/google.png" width="92" class="mx-4">
        <div class="searchbox">
            <form method="POST">
                <input type="text" class="searchbar" name="text">
                <input type="submit" value="search.."class="submit"name="save"> 
            </form>
<!--  <div class="icons d-flex" >
<div class="micimg mx-3"><img src="img/mic.png"></div>

<div class="micimg"><img src="img/search.png"></div>
</div> -->
</div>
</nav>

</body>
</html>
<?php
include('classes.php');
$search=new searching();
if(isset($_POST['save']))
{
    $text=trim($_POST['text']);
    $row=$search->fetchdata($text);
    if(mysqli_num_rows($row)>0){
        while($result=mysqli_fetch_assoc($row)){
            ?>

            <div style=
            "width: 700px;
            margin: auto;
            margin: 10px;
            text-align: left;">
            <h1><?php echo $result['title']?></h1>
            <img class="card-img-top" src="./gallery/<?php echo $result['image']; ?>"style ="width:200px; height:200px;"/>
            <p><?php echo $result['description']?></p>
            <p>Click URL For Full details</p> <?php  echo "<a href= '".$result['url']."'>".$result['url']."</a>";
            echo "<br/>";?>
        </div>
        <?php

    }
}
else
{
    echo "no data found";
}

}


?>