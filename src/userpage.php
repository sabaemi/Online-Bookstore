<!DOCTYPE html>
<html lang="en">
<head>
<title>UserPage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/usercss.css">
  <?php
            $err = "";
            $servername = "localhost";
            $username = "username";
            $password = "password";
            $dataBase = "bookclub";
            $err = "";
            $conn = new mysqli($servername, $username, $password, $dataBase);
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            } 
            function test_input($data) {
                $data = trim($data);
                $data = stripslashes($data);
                $data = htmlspecialchars($data);
                return $data;
              }
            if($_GET){
                $user = $_GET['user'];     
              }else{
              echo "Url has no user";
              }              
            ?> 
</head>
<body>

<div class="container">
  <div class="row justify-content-center">
  <div class="col-md-5">
   <div class="card">
     <h2 class="card-title text-center">PROFILE</h2>
      <div class="card-body py-md-4">
       <form method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>

       <?php
$nn="SELECT userType FROM User WHERE username='".$user."' ";
            $re = mysqli_query($conn, $nn);
            $r = mysqli_fetch_assoc($re);
            $llaa = $r['userType'];
            echo'<div class="form-group">Name</div>';
            echo 'UserName : '.$user.'<br>';
            if($llaa=='S'){
                $le="SELECT firstName,lastName,storeName FROM Seller WHERE username='".$user."'";
                $rele = $conn->query($le);  
            $rrel = mysqli_fetch_assoc($rele);
            echo'<div class="form-group">';
            echo 'Name : '.$rrel['firstName']." ".$rrel['lastName'].'<br>';
            echo 'StoreName : '.$rrel['storeName'].'<br>';
            echo'</div">';
             }
            
            if($llaa=='B'){
                $le="SELECT firstName,lastName FROM Buyer WHERE username='".$user."'";
                $rele = $conn->query($le);
                $rrel = mysqli_fetch_assoc($rele);
                echo'<div class="form-group">';
                echo 'Name : '.$rrel['firstName']." ".$rrel['lastName'].'<br>';
                echo'</div">';
        }
            ?>
            <br>
            <div class="d-flex flex-row align-items-center justify-content-between">
            <button type="submit" class="btn btn-primary" name="cancel">Back</button>
            </div>
            <!-- <input type="submit" class="hmbtn" name="cancel" value="Back">  -->
            <?php
            if($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['cancel'])) {
                header("Location: adminpage.php");
               }
            ?>
          <!-- <div class="form-group">
             User Name:<input type="text" class="form-control" id="name" placeholder="User Name" name="username">
          </div>
          <div class="form-group">
             Email:<input type="email" class="form-control" id="email" placeholder="Email" name="email">
          </div>                        
          <div class="form-group">
            Password:<input type="password" class="form-control" id="password" placeholder="Password" name="password">
          </div>
          <div class="form-group">
            Favourite color:<input type="text" class="form-control" id="color" name="color" placeholder="Favourite color">
          </div>
          <div class="form-group">
            First teacher's name:<input type="text" class="form-control" id="ftn" name="ftn" placeholder="First teacher's name">
          </div>
          <div class="form-group">
            User Type: <br> <br>
            <input type="radio"  name="userType" value="L"> Listener
            <input type="radio" name="userType"  value="A"> Artist
          </div>
          <div class="d-flex flex-row align-items-center justify-content-between">
            <a href="jhl">Cancel</a>
            <button type="submit" class="btn btn-primary">Create Account</button>
          </div> -->
       </form>
     </div>
  </div>
</div>
</div>
</div>

</body>
</html>
