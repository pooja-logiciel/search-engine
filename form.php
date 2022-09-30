<?php
$connection = mysqli_connect("localhost","root","","search");
if(isset($_POST['submit']))
{
  $title = $_POST['title'];
  $description = $_POST['description'];
  $url = $_POST['url'];
  $filename=$_FILES['img'];
  $filename=$_FILES['img']['name'];
  $filepath=$_FILES['img']['tmp_name'];
  $imagename=explode(".", $filename);
  $ex=$imagename[1];
  $sql="show table status like 'articles'";
  $result=mysqli_query($connection,$sql);
  $row=mysqli_fetch_assoc($result);
  $id=$row['Auto_increment'];
  $newfilename=$id.".".$ex;
  $query =   "INSERT INTO articles(title,description,url,image) VALUES
  ('{$title}','{$description}','{$url}','{$newfilename}')";
  if(mysqli_query($connection,$query))
  {
  move_uploaded_file($filepath,"./gallery/".$newfilename);
  
  }
 
}
?>
<html>
<head>
  <title>Form for entering Data</title>
</head>
<body>
  <form action="" method="POST" enctype="multipart/form-data">
    <p>
      Article Title<br />
      <input type="text" name="title" size="100" />
    </p>
    <p>
      Description <br />
      <textarea name="description" cols="50" rows="5"></textarea>
    </p>
    <p>
      URL <br  />
      <input type = "text" name="url" size="100" />
    </p>
    <p>
      image<br / />
      <input type="file" name="img"/>
    </p>
    <input type = "submit" name="submit" value="Save"  />
  </form>
</body>
</html>
<a href="index.php">Go Back</a>
