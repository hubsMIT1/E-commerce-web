
 <?php
include 'server2.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: home.php");
    exit;
}

?>
<!-- 
        <div class="alert alert-success">
  <strong>Successfully!</strong> Added Time Limit !!
</div> -->
<?php 

  


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

  <table class="table ">
    <thead style='color:white; font-size:2rem;background:lawngreen'>
    <!-- <th>User Name  </th> -->
    <th>Product Name </th>
    <th>Bidded Amount </th>
    <!-- <th>Edit  </th> -->
    <th>Bid End Time</th>
    </thead>
    
    
 
 <?php 
          
          $qr2 = "SELECT * FROM bid_amount";
   
          $pshow2 = mysqli_query($con,$qr2);
      
          $prow = mysqli_num_rows($pshow2);
        //   $qr2 = "SELECT * FROM product";
      
        //   $pshow = mysqli_query($con,$qr2);
         
        //   $prow = mysqli_num_rows($pshow);

         $k =0;
        
         while($pftch2 = mysqli_fetch_assoc($pshow2)){
       //  $_SESSION['p']
               // $pftch['pName']; 
               $arr = array('primary','danger','success','info');
               $rd = rand(0,3);
               $idB = $pftch2['pId'];
               $uId2  = $pftch2['uId'];
            //    echo $idB;
               if($_SESSION['id']==$uId2){
               // echo $_SESSION['id'];
               // echo $pftch['userId'];
                // if($pftch['id2'] == $id2){


?>
 <tbody>
  <tr class="<?= $arr[$rd];?>">

        
<td class="pro2">  <a href='pdBook.php?id2=<?=$pftch2['pId']?>'><?php echo $pftch2['Pnm_b'] ?></a></td>
<td><?php echo $pftch2['amount'] ?></td>
    <!-- <div class="container">  -->
<?php
      
 $slctP = "SELECT * FROM bidl where pIdB = $idB";

$pqr = mysqli_query($con,$slctP);
$brow = mysqli_num_rows($pqr);

while($pftch = mysqli_fetch_assoc($pqr)){
    ?>
        <td><?php  echo $pftch['timeL'].'-'.$pftch['mnth'].'-'.$pftch['yr'];  //if( $pftch2['pId']==$pftch['pIdB'] && $pftch['uIdB']== $_SESSION['id']){ echo $pftch['timeL'];} else{ echo "Not Yet Set"; }
            ?></td>
       
   
      
   
   
   
    <?php

}
if($brow ==0){
    ?>
    <td> Yet not Set </td>

    <?php
}

}
             
             }
             if($prow ==0){
                
                    ?>

 
                 <center> <th> Yet No Any Bided Product!! </th></center>
                  <?php
           
             }
            
               ?>
  </table>
  
</div>




            </body>
    </html>