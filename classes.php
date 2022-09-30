<?php
class searching{
  private $server="localhost";
  private $root="root";
  private $password="";
  private $dbname="search";
  protected $connection;

  function __construct(){
    $this->connection = new mysqli($this->server , $this->root , $this->password , $this->dbname)or die("connection die");
    if($this->connection)
    {
      return true;
    }
  }
  function fetchdata($search){
    if(strpos($search,'-')!==false)
      {

      global $con;
      $str1 = strpos($search, "-");
      $str1 = $str1 + 1;
      $str = $search;
      $str2 = substr($str,$str1);
      $query = "SELECT id,title,description,url,image FROM articles WHERE title NOT LIKE '%$str2%' AND description NOT LIKE '%$str2%'";
      $result = mysqli_query($this->connection,$query);

      $result_num = mysqli_num_rows($result);
      
      while ($result_row = mysqli_fetch_assoc($result)) {
      $return_results[] = array(
        'title' => $result_row['title'],
        'description' => $result_row['description'],
        'image' => $result_row['image'],
        'url' => $result_row['url'],
      );
      }
      return $return_results;
      
      }
      else
      {

// This where variable will be used to build dynamic where clause in query
        $where ="";
// It will store the searched keywords in an array
        $keywords = preg_split("/[\s]+/",$search);
//It will count total Keywords
        $total_keywords = count($keywords);

        foreach($keywords as $key =>$keyword){
          $where .= "title LIKE '%$keyword%' or description like '%$keyword%'";
          if($key != $total_keywords-1){
            $where .= " AND ";
          }

        }

        $query ="SELECT id,title,description,url,image FROM articles WHERE $where ";
        $row=mysqli_query($this->connection,$query);
        return $row;
      }
    }
    function show($id){
      $query ="select * from articles where id = $id";
      if ($row=mysqli_query($this->connection,$query))
      {
        if(mysqli_num_rows($row)>0){
          while($result=mysqli_fetch_assoc($row)){
            return $result;

          }
        }
      }
    }

  }
  $object=new searching();

  ?>