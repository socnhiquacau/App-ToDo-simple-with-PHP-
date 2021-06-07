<?php
include("./data/Data.php");
$Data = new Data;
$todo_list = $Data->fetch();

?>
<style>

#BodyTask{
height:  60%;

}
.container-fluid {
background-color: pink; 
}
body{
  background-color: #85bf97 !important; 
}

</style>
<link rel="stylesheet" href="./css/bootstrap.min.css">
<h3 class="text-center mt-3" >TO DO</h3>

<?php 
if (isset($_SESSION['alert'])) { ?>
  <div class="alert alert-danger" role="alert">
  <?= $_SESSION['alert'] ?>
  </div>
  <?php }
 ?>

<body>
  
<div class="container-fluid w-50 mt-5">
    
    
    <span> Title </span>
    <form action="./data/Data.php" method="post">

    <div class="input-group">
        
        <input type="text" name="title" class="form-control" aria-label="Text input with segmented dropdown button">
        </div>   
           <Label> Content</Label>
        <div class="input-group">
     
            <input type="text" name="content" class="form-control" aria-label="Text input with segmented dropdown button">
        </div>
      
    

     <button class="btn btn-info w-100" type="Submit"> ADD </button>

    </form>
    
   
      <div id="BodyTask" class="container mt-5 overflow-auto">
        <?php while ( $row = mysqli_fetch_array($todo_list)) :  ?>
       
    
        <div id="task<?= $row['id'] ?>" class="card p-1 m-3">
            <div class="card-body">
                <div class="row"><h5 class="card-title"><?= $row['title'] ?></h5>  </div>
              <p class="card-text"> <?= $row['content'] ?></p> <div data-id="<?= $row['id'] ?>" class="btn btn-danger float-right "> remove </div>
              <span>AT  <?= $row['time'] ?></span>
              <div class="form-check form-switch">
                <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" checked>
                <label class="form-check-label" for="flexSwitchCheckChecked"> DONE </label>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
  </div>


</body>


  <script src="./js/jquery-3.6.0.min.js"></script>
  <script>

    $(".btn-danger").on('click', function() { 
            var id = $(this).data('id');
           $.post( "./data/Data.php", { id: id })
            .done(function( data ) {

              alert("Task has been deleted")
              $('#task'+id).hide(1500);
             
            });

     })

 

  </script>