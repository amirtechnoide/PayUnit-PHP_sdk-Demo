<?php

class Connection
{

  private  $server = "mysql:host=localhost;dbname=PHP-sdk-PayUnit";

  private $user = "amir";
  
  private $pass = "Tch@kount1";


  private $options  = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,);

  protected $con;

  public function open()

  {

    try {

      $this->con = new PDO($this->server, $this->user, $this->pass, $this->options);

      return $this->con;
    } catch (PDOException $e) {

      echo "There is some problem in connection: " . $e->getMessage();
    }
  }

  public function close()
  {

    $this->con = null;
  }
}
