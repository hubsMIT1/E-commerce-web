<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1.0"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"> -->
      <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script> -->
      <!-- <link rel="stylesheet" href="style.css"> -->
    <title>your account</title>

    <style>
        body{
    margin-top:20px;
    color: #1a202c;
    text-align: left;
    background-color: #e2e8f0;    
}
.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
.w{
    margin:auto;
    /* text-align:center; */
    width: 50vw;
}
a{
    text-decoration:none;
}
.log1 {
    width: 7rem;
    font-size: 1.5rem;
    margin: auto;
    padding: 0.5rem 0px;
    cursor: pointer;
    background: lime;
    border-radius: 5px;
    border: 3px white;
    box-shadow: 0 6px 16px 0 rgb(0 200 0 / 20%)
}

.log1:hover {
    box-shadow: 0 10px 20px 0 rgb(245, 19, 196);
    background: rgb(245, 19, 196);
    color: white;
    border: 5px white;
}
        </style>
</head>
<body>

<!-- <bottun class="active">Home</button></a> -->
      
<a href="home.php"><button class="log1" type="submit" name='login'>Home</button></a>
   
  
  <?php
if(isset($_GET['id'])){
    $id = $_GET['id'];


//   $id = 
  include 'server2.php';
  session_start();
  if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin']!=true){
    header("location: home.php");
    exit;
}
//   $id = $_SESSION['id'];
  $sql = "Select * from users where id= $id";
$result = mysqli_query($con, $sql);
  $num = mysqli_num_rows($result);
 while($row = mysqli_fetch_assoc($result)){
    
    $email = $row['useremail'];
    $usernm = $row['username'];

 }
//  $uId = $_SESSION['id'];


$slctP = "SELECT * FROM product where userId = $id";

$pqr = mysqli_query($con,$slctP);

$prow = mysqli_num_rows($pqr);

  ?>




<div class="col-md-8 w">
              <div class="card mb-3">
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h3 class="mb-0">Full Name</h3>
                    </div>
                    <div class="col-sm-9 text-secondary">
                        <?php
                        echo $usernm;
                      ?>
                    </div>
                  </div>
                 
                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h3 class="mb-0">Email</h3>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <?php
                     echo $email;
                      ?>
                    </div>
               

                  <hr>
                  <div class="row">
                    <div class="col-sm-3">
                      <h3 class="mb-0">Total Uploaded Product </h3>
                    </div>
                    <div class="col-sm-9 text-secondary">
                    <div class="col-sm-9 text-secondary">
                      <?php
                     echo $prow;
                      ?>
                    </div>
                  </div>
</div>


                  <hr>
                  <?php
                }
                ?>

                  </body>
</html>