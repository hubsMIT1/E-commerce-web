
 <?php
include 'server2.php';
session_start();
if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: home.php");
    exit;
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
       
      
    </nav>
    <div class="container">
  <!-- <h2>Contextual Classes</h2>
  <p>Contextual classes can be used to color table rows or table cells. The classes that can be used are: .active, .success, .info, .warning, and .danger.</p> -->

  <table class="table">
  <thead style='color:white; font-size:1.3rem;background:black;'>
    <th>User Name  </th>
    <th>User Email   </th>
    <th>Total Uploaded Product  </th>
    <!-- <th>Edit  </th> -->
    <!-- <th>Add Time Limit</th> -->
    </thead>
    
    
 
 <?php 
//  echo 'kwjbdHBWSDJ<Hbdnb SNDAsvnb';
          
          $qr2 = "SELECT * FROM users";
   
          $pshow2 = mysqli_query($con,$qr2);
      
          $prow = mysqli_num_rows($pshow2);
        
         $k =0;
        
         while($pftch = mysqli_fetch_assoc($pshow2)){
       //  $_SESSION['p']
               // $pftch['pName']; 
               $arr = array('primary','danger','success','info');
               $rd = rand(0,3);
               $idB = $pftch['id'];
            //    echo $_SESSION['id'];
            //    echo $pftch['userId'];
                // if($pftch['id2'] == $id2){


?>

    <!-- <div class="container">  -->
      
     



    
          <?php
       

$slctP = "SELECT * FROM product where userId = $idB";

$pqr = mysqli_query($con,$slctP);

$prow = mysqli_num_rows($pqr);
    ?>
    <tbody>

<tr class="<?= $arr[$rd];?>">
        <td><a href='uracnt.php?id=<?=$pftch['id']?>'><?php echo $pftch['username'] ?></a></td>
        <td class="pro2">  <?php echo $pftch['useremail'] ?></a></td>
        <td><?php echo $prow; ?></td>
      
    </tr>      
     
  
    </tbody>
   
    <!-- <td> <button name='bidAmnt' action=" " class="log1" type="submit"> bid </button></td> -->
    <?php
// }
               }
            // }
               ?>
  </table>
  
</div>




            </body>
    </html>