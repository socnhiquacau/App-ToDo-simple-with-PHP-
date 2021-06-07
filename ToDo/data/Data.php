<?php
session_start();
class Data {

  public function config()
  {
     $conn = mysqli_connect("localhost","root","","todo");
      if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
                }
      mysqli_set_charset( $conn , "utf-8");
      return $conn;
  }
  
  public function fetch()
  {
     $con = $this->config();
    $sql = "SELECT * FROM `list` ";
    $res = mysqli_query($con, $sql);
    return $res;

  }
  public function del($id)
  {
     $con = $this->config();
     $sql = "DELETE FROM `list` WHERE id='$id' ";
     $res = mysqli_query($con, $sql);
    return $res;

  }
  public function Add($title,$content)
  {
     $con = $this->config();
     $sql = "INSERT INTO `list`( `title`, `content`, `done`) VALUES ('$title','$content', 0)";
     $res = mysqli_query($con, $sql);
     return $res;

  }


  }

  if (isset($_POST['title']) && isset($_POST['content'])) {

    $title = $_POST['title'];
    $content = $_POST['content'];
    $Data = new Data;
    $result = $Data->Add($title,$content);
    $alert = "NO ADD";
    $result ? header("location: ../index.php") : $_SESSION['alert']= "NO ADD MORE";
  
  }

  if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $Data = new Data;
    $result = $Data->Del($id);
    
  }



  ?>