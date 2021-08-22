<?php
include 'server2.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: home.php");
    exit;
}
$id2 = $_GET['id2'];
// $id2 = $_GET['id2'];
    if(isset($_GET['id2'])){
   
$uId = $_SESSION['id'];

$slctP = "SELECT * FROM product where id2 = $uId";

$pqr = mysqli_query($con,$slctP);

while($pftch = mysqli_fetch_assoc($pqr)){
    ?>
         <!-- <div class="alert alert-danger">
  <strong>Sorry</strong> Try again!!
</div> -->
<!-- ?> -->
<?php
// UPDATE `product` SET `id2`='[value-1]',`pName`='[value-2]',`amount`='[value-3]',`pImg`='[value-4]',`desc`='[value-5]',`userId`='[value-6]',`dt2`='[value-7]' WHERE 1

      
if(isset($_POST['chngname'])){
 
   
    $pname = $_POST['pname'];
    if($pname != ""){
    $sqlUp1 = "UPDATE`product` SET `pName`='$pname' WHERE id2 = $id2";
    $qrUp1 = mysqli_query($con,$sqlUp1);
    if($sqlUp1){
        session_start();
        header('Location: product.php');
        exit;
        }
    }else{
        echo "can not set as Empty";
    }

}
if(isset($_POST['chngDesc'])){
   
$desc = $_POST['descN'];
if($desc != ""){
$sqlUp1 = "UPDATE`product` SET `desc`='$desc' WHERE id2 = $id2";
$qrUp1 = mysqli_query($con,$sqlUp1);
if($sqlUp1){
    session_start();
    header('Location: product.php');
    exit;
    }
}else{
    echo "can not set as Empty";
}
}
if(isset($_POST['chngeamnt'])){
$amount = $_POST['bidNA'];

if($amount != ""){
$sqlUp1 = "UPDATE`product` SET `amount`='$amount' WHERE id2 = $id2";
$qrUp1 = mysqli_query($con,$sqlUp1);
if($sqlUp1){
session_start();
header('Location: product.php');
exit;
}
}
else{
    echo "can not set as Empty";
}

}

if(isset($_POST['chngPic'])){
    // name="chngeimg"
    $pImage = $_FILES["chngeimg"];
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

        $sqlUp2 = "UPDATE `product` SET `pImg`='$goImg' WHERE id2 = $id2";
        $qrUp1 = mysqli_query($con,$sqlUp2);
        if($sqlUp2){
            session_start();
            header('Location: product.php');
            exit;
            }
    }else{
        echo "choose only jpg/png/jpeg type file!!";
    }

}


 

if(isset($_POST['dlt'])){

    $dlt1 = "delete from product where id2 = $id2";
    $dltP = mysqli_query($con,$dlt1);
    if($dltP){
        session_start();
        header('Location: product.php');
        exit;
    }

}
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
     <form method='post'  action=" " enctype="multipart/form-data">
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
        <td> <input  type='text' class=" input1" name="pname" placeholder="Change Product Name " > <input type='submit' value='change' name="chngname"></td>
        
      </tr>      
      <tr class="success">
        <th>Description :</th>
        <td> <?php echo$pftch['desc'] ?></td>
        <td> <input  type='text' class=" input1" name="descN" placeholder="Change Description" > <input type='submit' value='change' name="chngDesc"></td>
      </tr>
      <tr class="info">
        <th>Min Bid Amount :</th>
        <td><?php echo$pftch['amount'] ?></td>
        <td> <input class="input1" name="bidNA" placeholder="Add New Amount " > <input type='submit' value='change' name="chngeamnt"></td>
     
      <tr class="success">
           
           <th>
              Change Image : 
           </th>
           <td> </td>
          <td> <input name="chngeimg" type='file' class=" input1"  placeholder="Change Image" > <input type='submit' value='change' name="chngPic"></td>
         
         
         </tr>
    
  
    </tbody>
   
   
    
  </table>
  </form>

   <button name='dlt' action=" " class="log1" > DELETE </button>
</div>
     


         <?php
    
  // }       
}
 }
// }
        ?>
      


    </body>     
     </html>