<?php 
include 'server2.php';
session_start();
// if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
//     header("location: home.php");
//     exit;
// }
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
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style> 

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
  if( $_SESSION['loggedin'] == true){
  
  ?>
      <li><a href="product.php">Your Products</a></li>
      <li><a href="urBid.php">Bid Prodcuts</a></li>
<?php 
  }
  if($_SESSION['username']=="Admin"){

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
else {
  ?>
   <li><a href=""><span class="glyphicon glyphicon-user"></span> Your Acount</a></li>
  <li><a href="home.php?logout='1'"><span class="glyphicon glyphicon-log-out"></span> logout </a></li>
  <?php
}
if($_SESSION['username']=='Admin'){
    ?>
    <li><a href=""><span class="glyphicon glyphicon-user"></span> All users </a></li>
   <li><a href="home.php?logout='1'"><span class="glyphicon glyphicon-log-out"></span> logout </a></li>
   <?php
}

      ?>
    </ul>
  </div>
</nav>


<div class="container">    
  <div class="row">
    <div class="col-sm-4">
      <div class="panel panel-primary">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-danger">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
    <div class="col-sm-4"> 
      <div class="panel panel-success">
        <div class="panel-heading">BLACK FRIDAY DEAL</div>
        <div class="panel-body"><img src="https://placehold.it/150x80?text=IMAGE" class="img-responsive" style="width:100%" alt="Image"></div>
        <div class="panel-footer">Buy 50 mobiles and get a gift card</div>
      </div>
    </div>
  </div>
</div><br>

<!-- <div class="container">
  <h3>Navbar Forms</h3>
  <p>Use the .navbar-form class to vertically align form elements (same padding as links) inside the navbar.</p>
  <p>The .input-group class is a container to enhance an input by adding an icon, text or a button in front or behind it as a "help text".</p>
  <p>The .input-group-btn class attaches a button next to an input field. This is often used as a search bar:</p>
</div> -->

</body>
</html>

