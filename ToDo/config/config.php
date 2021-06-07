<?php

class config {

  public function config()
  {
     $conn = mysqli_connect("localhost","root","","todo");
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
                }
  mysqli_set_charset( $conn , "utf-8");
  return $conn;
  }
}


    
  
  
