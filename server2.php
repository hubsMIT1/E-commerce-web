 <?php 
if(isset($_SESSION['loggedin']) && $_SESSION['loggedin']==true){
    $loggedin= true;
    $_SESSION['loggedin'] = true;
    // $_SESSION['username'] = $name;
    // $_SESSION['id'] = $row['id'];
  }
  else{
    $_SESSION['loggedin'] = false;
    $loggedin = false;
  }
  ?>
  
  
  <?php
  
  $server = 'localhost';
  $user = 'root';
  $password= '';
  $db = 'money war';
  
  
  $con = mysqli_connect($server,$user,$password,$db);
  
  if($con){
  ?>
   
  <?php
  }
  
  ?> 