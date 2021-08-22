
 <?php
include 'server2.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: home.php");
    exit;
}

if(isset($_POST['bidtmLt'])){

    $pId = $_GET['id2'];
    $uIdb = $_GET['id3'];
    // echo $pId;
    $bidTm = $_POST['bidL'];
    $insertBl = "INSERT INTO `bidl`(`pIdB`,`uIdB`,`timeL`) VALUES('$pId',' $uIdb','$bidTm')";

    $BLqr = mysqli_query($con,$insertBl);
    if($BLqr){
        ?>

        <div class="alert alert-success">
  <strong>Successfully!</strong> Added Time Limit !!
</div>
<?php 

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
    
      .bidtimeLt{
          width: 1rem;

      }
      .bidtime{
          
      }
      .pro2{
          cursor: pointer;
      }
      a{
          color: black;
      }
    </style>
    
    
    </head>
    <body>
    
    
    <nav class="navbar navbar-inverse">
      <div class="container-fluid">
        <div class="navbar-header nv1">
        <ul class="nav navbar-nav">
      <li class="active"><a href="home.php">Home</a></li>
        </ul>
          <!-- <a class="navbar-brand" href="#">WebSiteName</a> -->
          <!-- <a class="navbar-brand nav-link k navbar-light" href="#"><b><i></i></b></a> -->
        </div>
       
        <!-- <form class="navbar-form navbar-right" action="/action_page.php">
          <div class="input-group">
            <input type="text" class="form-control" placeholder="Search" name="search">
            <div class="input-group-btn">
              <button class="btn btn-default" type="submit">
                <i class="glyphicon glyphicon-search"></i>
              </button>
            </div>
          </div>
        </form> -->
        <ul class="nav mb-0 navbar-nav navbar-right">
       <!-- <a href='home.php'> <button class="btn btn-info navbar-btn btn-right">Home</button></a> -->
        </ul>
        
       
      </div>
    </nav>
    <div class="container">
  <!-- <h2>Contextual Classes</h2>
  <p>Contextual classes can be used to color table rows or table cells. The classes that can be used are: .active, .success, .info, .warning, and .danger.</p> -->

  <table class="table">
  <thead style='color:white; font-size:1.3rem;background:black;'>
    <th>User Name  </th>
    <th>Product Name  </th>
    <th>Bidded Amount  </th>
    <!-- <th>Edit  </th> -->
    <!-- <th>Add Time Limit</th> -->
    </thead>
    
    
 
 <?php 
//  echo 'kwjbdHBWSDJ<Hbdnb SNDAsvnb';
          
          $qr2 = "SELECT * FROM bid_amount";
   
          $pshow2 = mysqli_query($con,$qr2);
      
          $prow = mysqli_num_rows($pshow2);
        //   $qr2 = "SELECT * FROM product";
      
        //   $pshow = mysqli_query($con,$qr2);
         
        //   $prow = mysqli_num_rows($pshow);

        // echo  $pftch2['uId'];
         $k =0;
        
         while($pftch2 = mysqli_fetch_assoc($pshow2)){
       //  $_SESSION['p']
               // $pftch['pName']; 
               $arr = array('primary','danger','success','info');
               $rd = rand(0,3);
               $idB = $pftch2['uId'];
            //    echo $_SESSION['id'];
            //    echo $pftch['userId'];
                // if($pftch['id2'] == $id2){


?>

    <!-- <div class="container">  -->
      
     



    
          <?php
        //   echo $idB;
        
 $slctP = "SELECT * FROM users where id = $idB";

$pqr = mysqli_query($con,$slctP);

while($pftch = mysqli_fetch_assoc($pqr)){
    // echo $pftch['id'];
    ?>
    <tbody>

<tr class="<?= $arr[$rd];?>">
        <td><?php echo $pftch['username'] ?></td>
        <td class="pro2">  <a href='pdBook.php?id2=<?=$pftch2['pId']?>'><?php echo $pftch2['Pnm_b'] ?></a></td>
        <td><?php echo $pftch2['amount'] ?></td>
        <!-- <td><?php // echo"Edit" ?></td> -->
       
        <!-- <td>  <form action='?id2=<?//=//$pftch2['pId']?>&id3=<?//=//$pftch2['uId']?>' method="post" ><input type='number' class="bidtime" name="bidL" placeholder="Bid Time Limit(in days)" required> <input class="bibtmbtn btn btn-default" name='bidtmLt' type='submit' value="Set">  </form></td> -->
      
    </tr>      
      <!-- <tr class="success">
        <th>Description :</th>
        <td> <?php //echo$pftch['desc'] ?></td> -->
       
      <!-- </tr>
      <tr class="info">
        <th>Min Bid Amount :</th>
       
        
      </tr>
      <tr class="danger"> -->
        <!-- <th>Bid ENd</th>
        <td>time</td> --> 
        
      <!-- </tr> -->
      <!-- <tr class="success">
           
        <th>
            Enter Your Bid Amount : 
        
        </th>
       <td> <input class="input" name="Bidamount" placeholder="Your Bid Amount " required></td> -->
      
        <!-- <td>act@example.com</td> -->
      <!-- </tr> -->
      <!-- <tr class="warning">
        <td>Warning</td>
        <td>Refs</td>
        <td>bo@example.com</td>
    </tr> -->
  
    </tbody>
   
    <!-- <td> <button name='bidAmnt' action=" " class="log1" type="submit"> bid </button></td> -->
    <?php
}
               }
            // }
               ?>
  </table>
  
</div>




            </body>
    </html>