<?php
class connector{
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
}
$object=new connector();

  ?>