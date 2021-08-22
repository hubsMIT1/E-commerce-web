<?php
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true && $_SESSION['username']!="Admin"){
    header("location: home.php");
    exit;
}
// session_start();
if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['username']);
    header("location: lgn.php");
}
include 'server2.php';

If(isset($_POST['Psubmit'])){


    $pname = $_POST['productname'];
    $amount = $_POST['amount'];
    $pImage = $_FILES['pImage'];
    $pdetails = $_POST['desc'];

//  print_r($pImage);   

$fname = $pImage['name'];
$ferr = $pImage['error'];
$ftmp = $pImage['tmp_name'];

$fext = explode('.',$fname);
$fcheck = strtolower(end($fext));
$fext2 = array('png','jpg','jpeg');

$goImg = './saveImg/'.$fname;
move_uploaded_file($ftmp,$goImg);
 
$userId = $_SESSION['id'];

if(in_array($fcheck,$fext2)){
    $pinsert = "INSERT INTO `product`( `pName`,`amount`, `pImg`, `desc`, `userId`) VALUES ('$pname','$amount','$goImg','$pdetails','$userId')";

    $pqr1 = mysqli_query($con, $pinsert);

   
 }
 
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
  <link rel="stylesheet" href="style.css">
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
.edit{
  color:green;
}
.edit:hover{
  color:green;
  background:black;
}
</style>


</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
    <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
    </ul>
      <!-- <a class="navbar-brand" href="#">WebSiteName</a> -->
      <!-- <li class="active"><a href="#">Home</a></li> -->
      <!-- <a class="navbar-brand nav-link k navbar-light" href="#"><b><i>Your Products</i></b></a> -->
    </div>
   
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
    <ul class="nav navbar-nav navbar-right">
   <a href='#addProduct'> <button class="btn btn-success navbar-btn btn-right">Add Product</button></a>
    </ul>
    
   
  </div>
</nav>


<!-- <div class="container">  -->
  
 
      <?php 
      
       $qr2 = "SELECT * FROM product";

       $pshow = mysqli_query($con,$qr2);
   
       $prow = mysqli_num_rows($pshow);
       $qr2 = "SELECT * FROM product";
   
       $pshow = mysqli_query($con,$qr2);
      
       $prow = mysqli_num_rows($pshow);
      $k =0;
     
      while($pftch = mysqli_fetch_assoc($pshow)){
    //  $_SESSION['p']
            // $pftch['pName']; 
            $arr = array('primary','danger','success');
            $rd = rand(0,2);
            // echo $_SESSION['id'];
            // echo $pftch['userId'];
            if($_SESSION['id'] == $pftch['userId'] || $_SESSION['username']=='Admin'){

            if($k%3 == 0)  {
               
      ?>
<div class="container">
<div class="row">
    
    <div class="col-sm-4 pro1">
      <div class="panel panel-<?php echo $arr[$rd]; ?>">
        <div class="panel-heading"><?php echo $pftch['pName'] ?></div>
     <a href='pdBook.php?id2=<?=$pftch['id2'] ?>'>   <div class="panel-body"><img src="<?php echo $pftch['pImg']; ?>" class="img-responsive" style="width:100%" alt="Image"></div></a>
        <div class="panel-footer"> <?php echo$pftch['desc'] ?></div>
        <a href='updtP.php?id2=<?=$pftch['id2'] ?>'> <div style='float:left ' class="panel-footer bid1 edit"> Edit  <?php //echo$pftch['desc'] ?> </div></a>
        <a href='pdBook.php?id2=<?=$pftch['id2'] ?>'>   <div   class="panel-footer  bid1 "> Bid <?php //echo $pftch['desc'] ?></div></a>
      </div>
    </div>
    
    <?php
            }
    
            else{
                ?>

    <div class="col-sm-4 pro1">
      <div class="panel panel-<?php echo $arr[$rd]; ?>">
        <div class="panel-heading"> <?php  echo $pftch['pName'] ?></div>
        <a href='pdBook.php?id2=<?=$pftch['id2'] ?>'>     <div class="panel-body"><img src="<?php echo $pftch['pImg']; ?>"class="img-responsive" style="width:100%" alt="Image">
 </div></a>
        <div class="panel-footer"><?php echo $pftch['desc'] ?></div>
        <a href='updtP.php?id2=<?=$pftch['id2'] ?>'>      <div style='float:left ' class="panel-footer bid1 edit"> Edit  <?php //echo$pftch['desc'] ?> </div></a>
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
      }
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
 <footer class="container-fluid text-center">
<form action="" method="POST" enctype="multipart/form-data">
    <div class="logPg" id="addProduct">
        <!-- <div onclick="signUp();" class="signup">SignUp </div> -->
        <div onclick='logIn();' class="login"> Add Products </div>
        <div class="logInp">
            <input class=" input" name="productname" placeholder="Product Name" required>
            <input class=" input" name="amount" placeholder="Minimun Bid Amount " required>
            <input class="input" name='pImage' type='file' required>
            <textarea class="urpswrd" name="desc" placeholder="Product deltails" ></textarea>
            <button name='Psubmit' action=" " class="log1" type="submit"> Add </button>

        </div>
    </div>
    </form>
 </footer>

</body>
</html>

