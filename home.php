<?php 
include 'server2.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    // header("location: home.php");
    // exit;
   if(isset($_GET['id2'])){
?>
 <div class="alert alert-danger">
  <strong>DO SignUp Or LogIN First !!</strong>
</div>

<?php



   }



}

if (isset($_GET['logout'])) {
  // session_start();
  $_SESSION['loggedin'] = false;
  // session_destroy();
  unset($_SESSION['username']);
  unset($_SESSION['id']);
  header("location: home.php");
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Produncts</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style> 
html{
    scroll-behavior: smooth;
}
.k{
  /* padding-left:30px; */
  float:center;
  text-align: center;
  justify-items: center;
  margin: auto;
  padding-left: vw;
  font-size: 2rem;
  color:white;
  font:bold;


  /* padding-right:30px; */
}
body{
    background: white;
}
.logPg{
    background:linear-gradient(blue,violet)
}
textarea {
    height: 15vh;
}
.bid1{
    font-size: 2rem;
    font:bold;
    font-family:'Times New Roman', Times, serif;
    color:red;
    background:white;
    text-align: center;
}
.bid1:hover{
    background:blue;
    cursor: pointer;
}
.pro1{
    cursor:pointer;

}
</style>


</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">

      <a class="navbar-brand" href="#">Welcome : <?php if($_SESSION['loggedin']==true) {echo $_SESSION['username'];} ?></a>
    </div>

    <ul class="nav navbar-nav">
      <li class="active"><a href="#">Home</a></li>
      <?php
  if( $_SESSION['loggedin'] == true && $_SESSION['username'] !="Admin"){
  
  ?>
     < <li><a href="product.php">Your Products</a></li>
      <li><a href="urBid.php">Bid Prodcuts</a></li>
<?php 
  }
  if($_SESSION['loggedin'] == true  && $_SESSION['username']=="Admin"){

    ?>
    <li><a href="product.php">All Products</a></li>
    <li><a href="bided.php">Bided Prodcuts</a></li>

   <?php 

  }
      ?>
    </ul>
    <form class="navbar-form navbar-right" action="/action_page.php">
      <div class="input-group">
        <input type="text" class="form-control" placeholder="Search" name="search">
        <div class="input-group-btn">
          <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
          </button>
        </div>
      </div>
    </form>
    </ul>

    <ul class="nav navbar-nav navbar-right">
      <?php 

// session_start();
   if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
  
      ?>
      <li><a href="signup.php"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="lgn.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
  
      <?php 
}
else if((isset($_SESSION['loggedin']) || $_SESSION['loggedin']==true) && $_SESSION['username']!="Admin") {
  ?>
   <li><a href='uracnt.php?id=<?=$_SESSION['id'];?>'><span class="glyphicon glyphicon-user"></span> Your Acount</a></li>
  <li><a href="home.php?logout='1'"><span class="glyphicon glyphicon-log-out"></span> logout </a></li>
  <?php
}
if( $_SESSION['loggedin']==true && $_SESSION['username']=='Admin'){
    ?>
    
    <li><a href="alluser.php"><span class="glyphicon glyphicon-user"></span> All users </a></li>
    <li><a href='uracnt.php?id=<?=$_SESSION['id'];?>'><span class="glyphicon glyphicon-user"></span> Your Acount</a></li>
   <li><a href="home.php?logout='1'"><span class="glyphicon glyphicon-log-out"></span> logout </a></li>
   <?php
}

      ?>
    </ul>
  </div>
</nav>
<?php 
if( $_SESSION['loggedin']!=true){
  ?>
  <div class="alert alert-danger">
  <strong>For bidding Login First </strong>
</div>
<?php
}


?>

<?php 
      

      $qr2 = "SELECT * FROM product ORDER BY amount DESC";

      $pshow = mysqli_query($con,$qr2);
  
      $prow = mysqli_num_rows($pshow);
      // $qr2 = "SELECT * FROM product";
  
      // $pshow = mysqli_query($con,$qr2);
     
      // $prow = mysqli_num_rows($pshow);
     $k =0;
    
     while($pftch = mysqli_fetch_assoc($pshow)){
   //  $_SESSION['p']
           // $pftch['pName']; 
           $arr = array('primary','danger','success');
           $rd = rand(0,2);
           // echo $_SESSION['id'];
           // echo $pftch['userId'];
          //  if($_SESSION['id'] == $pftch['userId'] || $_SESSION['username']=='Admin'){

           if($k%3 == 0)  {
              
     ?>
<div class="container">
<div class="row">
   
   <div class="col-sm-4 pro1">
     <div class="panel panel-<?php echo $arr[$rd]; ?>">
       <div class="panel-heading"><?php echo $pftch['pName'] ?></div>
    <a href='pdBook.php?id2=<?=$pftch['id2'] ?>'>   <div class="panel-body"><img src="<?php echo $pftch['pImg']; ?>" class="img-responsive" style="width:200px" alt="Image"></div></a>
       <div class="panel-footer"> <?php echo$pftch['desc'] ?></div>
       <!-- <a href='updtP.php?id2=<?=$pftch['id2'] ?>'> <div style='float:left ' class="panel-footer bid1 edit"> Edit  <?php //echo$pftch['desc'] ?> </div></a> -->
       <a href='pdBook.php?id2=<?=$pftch['id2'] ?>'>   <div   class="panel-footer  bid1 "> Bid <?php 
    
      //   $qr2 = "SELECT * FROM bid_amount";
   
      //   $pshow2 = mysqli_query($con,$qr2);
    
      //   $prow = mysqli_num_rows($pshow2);
      
      //  $k =0;
      
      //  while($pftch2 = mysqli_fetch_assoc($pshow2)){

// if($pftch2['pId']==$pftch['id2']){
//   echo "(Max Bid :".$pftch2['amount'].")";
// }
      //  }
       //echo $pftch['desc'] ?></div></a>
     </div>
   </div>
   
   <?php
           }
   
           else{
               ?>

   <div class="col-sm-4 pro1">
     <div class="panel panel-<?php echo $arr[$rd]; ?>">
       <div class="panel-heading"> <?php  echo $pftch['pName'] ?></div>
       <a href='pdBook.php?id2=<?=$pftch['id2'] ?>'>     <div class="panel-body"><img src="<?php echo $pftch['pImg']; ?>"class="img-responsive" style="width:200px; background-size: 200% 100%" alt="Image">
</div></a>
       <div class="panel-footer"><?php echo $pftch['desc'] ?></div>
       <!-- <a href='updtP.php?id2=<?=$pftch['id2'] ?>'>      <div style='float:left ' class="panel-footer bid1 edit"> Edit  <?php //echo$pftch['desc'] ?> </div></a> -->
       <a href='pdBook.php?id2=<?=$pftch['id2'] ?>'>     <div   class="panel-footer  bid1 "> Bid <?php //echo $pftch['desc'] ?></div></a>
     </div>
   </div>
 
   <!-- </div> -->
   <?php 

           }
          
           $k++; 
  
   if($k%3 == 0 && $k != 0){

   
   ?>
    </div>
    </div> <br>
    <?php
   }
   ?>
   <?php
    //  }
   }
   if($k%3 != 0){
        
       ?>
        </div>
    </div> <br>
    <?php
   }
   
   
   ?>
 
<br>
<br>

</body>
</html>

