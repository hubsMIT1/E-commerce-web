<?php
include 'server2.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: signup.php");
    exit;
}
// else{

// }
$id2 = $_GET['id2'];
// $id2 = $_GET['id2'];
    if(isset($_GET['id2'])){


//   $slctP2 = "SELECT * FROM product where id2 = $id2";

// $pqr2 = mysqli_query($con,$slctP2);
// $prow = mysqli_num_rows($pqr2);

$uId = $_SESSION['id'];

$slctP = "SELECT * FROM product where id2 = $uId";

$pqr = mysqli_query($con,$slctP);

// $prow = mysqli_num_rows($pqr);

while($pftch = mysqli_fetch_assoc($pqr)){
 $pnm =  $pftch['pName'];
  if(isset($_POST['bidAmnt'])){

      $bidA = $_POST['Bidamount'];

      $insertB = "INSERT INTO `bid_amount` ( `Pnm_b`,`amount`, `pId`, `uId`) VALUES ('$pnm','$bidA','$id2','$uId')";
      $pqrB = mysqli_query($con,$insertB);

      //$prow = mysqli_num_rows($pqrB);


      if($pqrB){

         session_start();
          header('Location: home.php');
          exit;
        ?>

<!-- <div class="alert alert-success">
  <strong>Successfully!</strong> You Bidded!!
</div> -->
         
          <?php
      }else{
        
        ?>
        <!-- <div class="alert alert-danger">
  <strong>Sorry</strong> Try again!!
</div> -->

<?php

      }

  }
}

// if($prow==0){
  ?>

  <!-- <div class="alert alert-danger">
  <strong>Sorry </strong> This Product has been Deleted!! 
</div> -->

<?php 
// }




// $id = $ftch2['id'];


if(isset($_POST['setbid'])){

  $bidTm = $_POST['bidTm'];
  $expT = explode('/',$bidTm);
  $dt = $expT[0];
  $mnth = $expT[1];
  $yr = $expT[2];
// echo $dt.' '.$mnth." ".$yr;
  $insertBl = "INSERT INTO `bidl`(`pIdB`,`timeL`,`mnth`,`yr`) VALUES('$id2','$dt','$mnth','$yr')";
  // '$dt','$mnth','$yr'
  $BLqr = mysqli_query($con,$insertBl);
  if($BLqr){
    session_start();

    header('Location: home.php');
    exit;
  }
      ?>

  <!-- <div class="alert alert-success"> -->
<!-- <strong>Successfully!</strong> Added Time Limit !! -->
<!-- </div> -->
<?php 

// }


 

}
    }
    date_default_timezone_set('Asia/Kolkata');
    // $n_d = date("d",strtotime($ftch2['dt4']));
    // $n_d2 = date("d",strtotime($ftch2['dt4']));
    
    $Cdt = date('d');
    $Cmnth = date('m');
    $Cyr = date('Y');

$scltT = "SELECT * FROM `bidl` WHERE pIdB = $id2";
$qrT = mysqli_query($con,$scltT);

$rowT = mysqli_num_rows($qrT);

while($Tftch = mysqli_fetch_assoc($qrT)){
  $tmbd = $Tftch['timeL'];

  // echo $tmbd." ".$Tftch['mnth'].' '.$Tftch['yr'];
}

// echo $Cyr.' '.$Cmnth.' '.$Cdt;

?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
      <title>Products</title>
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
    .nv1{
        text-align: center;
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
        margin: auto;
       
    }
   @media screen and (min-width:750px){
    .con{
        text-align: center;
        justify-items: center;
        margin: auto;
        margin-left: 35%;
    }
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
        background:darkblue;
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
      <!-- <a class="navbar-brand" href="#">WebSiteName</a> -->
      <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
      </ul>
      <!-- <li class="active"><a href="#">Home</a></li> -->
      <!-- <a class="navbar-brand nav-link k navbar-light" href="#"><b><i>Your Products</i></b></a> -->
    </div>
   
    <form class="navbar-form navbar-right" action="/action_page.php">
      <div class="input-group">
        <!-- <input type="text" class="form-control" placeholder="Search" name="search"> -->
        <div class="input-group-btn">
          <!-- <button class="btn btn-default" type="submit"> -->
            <!-- <i class="glyphicon glyphicon-search"></i> -->
          <!-- </button> -->
        </div>
      </div>
    </form>
    <ul class="nav navbar-nav navbar-right">
   <!-- <a href='#addProduct'> <button class="btn btn-success navbar-btn btn-right">Add Product</button></a> -->
    </ul>
    
   
  </div>
</nav>
<?php 

if(isset($_GET['id2'])){


$slctP2 = "SELECT * FROM product where id2 = $id2";

$pqr2 = mysqli_query($con,$slctP2);
$prow = mysqli_num_rows($pqr2);
if($prow==0){
?>

<div class="alert alert-danger">
<strong>Sorry </strong> This Product has been Deleted!! 
</div>
<?php
}
}
    
  ?>  
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
                if($pftch['id2'] == $id2){

          ?>
          
<?php 

?>
    
    
    <div class="container con">
    <div class="row">
        
        <div class="col-sm-4 pro1">
          <div class="panel panel-<?php echo $arr[$rd]; ?>">
            <div class="panel-heading"><?php echo $pftch['pName'] ?></div>
           <div class="panel-body "><img src="<?php echo $pftch['pImg']; ?>" class=" img-responsive" style="width:100%" alt="Image"></div>
            <!-- <div class="panel-footer"> <?php //echo$pftch['desc'] ?></div> -->
              <!-- <div class="panel-footer bid1"> Bid  <?php //echo$pftch['desc'] ?></div> -->
          </div>
        </div>
        
       
             </div>
         </div>
    <br>
     <form method='post'  action=" ">
    <div class="container">
  <!-- <h2>Contextual Classes</h2>
  <p>Contextual classes can be used to color table rows or table cells. The classes that can be used are: .active, .success, .info, .warning, and .danger.</p> -->

  <table class="table">
    <thead>
     
    </thead>
    <tbody>
      <tr>
        <th>Product Name : </th>
        <td><?php echo $pftch['pName'] ?></td>
        
      </tr>      
      <tr class="success">
        <th>Description :</th>
        <td> <?php echo$pftch['desc'] ?></td>
       
      </tr>
      <tr class="info">
        <th>Min Bid Amount :</th>
        <td><?php echo$pftch['amount'] ?></td>
        
      </tr>
     
      <?php
      if($_SESSION['username']=="Admin"){
           
        ?>
        <!-- <form action=" " method="POST"> -->
        <tr class="success">
            
          <th>
              Set  Time Limit For Bid (should in this format): 
          
          </th>
         <td> <input  class="input" name="bidTm" placeholder="day/month/year" required> <input type='submit' name="setbid" value='Set'> </td>
        
          <!-- <td>act@example.com</td> -->
        </tr>
        

<?php
      }else{

        

      ?>
      
        <?php 
        
        $scltT = "SELECT * FROM `bidl` WHERE pIdB = $id2";
        $qrT = mysqli_query($con,$scltT);
        
        $rowT = mysqli_num_rows($qrT);
        if($rowT !=0){
//  while
   $Tftch = mysqli_fetch_assoc($qrT );//){

      //  $tmbd = $Tftch['timeL'];

     
        ?> 
        <tr class="danger">
        <th>Bid End</th>
        <!-- echo  -->
       
        <td class="danger"><?php echo $tmbd.'-'.$Tftch['mnth'].'-'.$Tftch['yr']; ?>
        <?php
         if($tmbd<=$Cdt && $Tftch['mnth']<= $Cmnth && $Tftch['yr'] <= $Cyr){
?>

<span style="color:red;"> (Ended)</span>
<?php
         }
         ?>
         </td>
         <?php
        // echo $tmbd;
    //  while($Tftch = mysqli_fetch_assoc($qrT)){

        // $tmbd = $Tftch['timeL'];
        // $expT = explode('/',$tmbd);
        // $yr = $expT[0]; 
        // $mnth = $expT[1];
        // $dt = $expT[2];
      
        // echo $tmbd;
    
      
      
        if($tmbd>=$Cdt && $Tftch['mnth']>= $Cmnth && $Tftch['yr'] >= $Cyr){
?>
</tr>
      <tr class="success">
          
        <th>
            Enter Your Bid Amount : 
        
        </th>
       <td> <input class="input" name="Bidamount" placeholder="Your Bid Amount " required></td>
      
        <!-- <td>act@example.com</td> -->
      </tr>
      <?php 
      // }
      // else {
      }
     
     
    // }
      ?>
      <!-- <tr class="warning">
        <td>Warning</td>
        <td>Refs</td>
        <td>bo@example.com</td>
    </tr> -->
  
    </tbody>
    <?php
    //  while($Tftch = mysqli_fetch_assoc($qrT)){


      // $tmbd = $Tftch['timeL'];
      // $dfrmt = date_parse_from_format('Y-d-m',$tmbd);

      // echo $dfrmt['year'];
      // echo $dfrmt['month'];
      // echo $dfrmt['day'];
      // $expT = explode('/',$tmbd);
      // $yr = $expT[0];
      // $mnth = $expT[1];
      // $dt = $expT[2];
      // echo $dt;
    

   if($_SESSION['username'] != "Admin"){
    if($tmbd >=$Cdt && $Tftch['mnth'] >= $Cmnth && $Tftch['yr'] >= $Cyr){

  ?>
    <td> <button name='bidAmnt' action=" " class="log1" type="submit"> bid </button></td>
    <?php
 }
}

  }


  if($rowT==0){
    ?>
 <tr class="danger">
        <th>Bid End</th>
<th> Yet not Set </th>
 </tr>
 <tr class="success">
          
          <th>
              Enter Your Bid Amount : 
          
          </th>
         <td> <input class="input" name="Bidamount" placeholder="Your Bid Amount " required></td>
        
          <!-- <td>act@example.com</td> -->
        </tr>
        <td> <button name='bidAmnt' action=" " class="log1" type="submit"> bid </button></td>

<?php
  }
}
    ?>
  </table>
  
</div>
     </form>


         <?php
    
  // }       

 }
}
        ?>
      


    </body>     
     </html>