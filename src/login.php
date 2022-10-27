<!DOCTYPE html>
<html lang="fa">
<head>
  <title>BookClubLogin</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/logincss.css">

</head>

<body>
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

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['login']))
{
  if (empty($_POST["loguser"]) || empty($_POST["logpass"])) {
    echo "<script>alert('لطفا تمام قسمت ها را وارد نمایید');</script>";
  }
  else{
    $loguser = test_input($_POST["loguser"]);
    $logpass = test_input($_POST["logpass"]);

    $nn="SELECT EXISTS(SELECT * FROM User WHERE username ='".$loguser."')";
    $re = $conn->query($nn);
    $r = $re->fetch_array();

    if($r[0]!=0){
      $sql = "SELECT * FROM User WHERE username ='".$loguser."'";
      $result = mysqli_query($conn, $sql);
      $row = mysqli_fetch_assoc($result);
      $rightPass = $row['pass'];
      $loginType = $row['userType'];
     
      if($rightPass == $logpass) {
        session_start();
        
        echo "<script>alert('خوش آمدید');</script>";
        if($loginType=='S'){
          $_SESSION['username'] = $loguser;
          header("Location: sellerpage.php?username=".$loguser);
        }
        if($loginType=='B'){
          $_SESSION['username'] = $loguser;
          header("Location: buyerpage.php?username=".$loguser);
        }
        if($loguser=='admin'){
          $_SESSION['username'] = 'admin99';
          header("Location: adminpage.php");
        }        
      }
      else{
        echo "<script>alert('رمزعبور صحیح نمی باشد');</script>";
      }
  }
  else echo "<script>alert('نام کاربری صحیح نمی باشد');</script>";
  }

}
?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['signup'])){
  header("Location: signup.php");
}
?>
<div class="container">
  <div class="vasat">
    <div style="height:100%;margin-bottom:30px;" class="row">
      <div style="margin-top:2%; width:100%;" class="col">
        <span style="margin-bottom:5%;" class="navbar-brand"><img class="d-block img-fluid" src="pics/u2.png" alt=""></span>
        <div class="row">
          <div class="col">
            <div class="myform">
              <form dir="rtl" class="text-right" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                <div class="form-group">
                  <label class="form-control-label">نام کاربری</label>
                  <input type="text" class="form-control" name="loguser">
                </div>
                <div class="form-group">
                  <label class="form-control-label">رمزعبور</label>
                  <input type="password" name="logpass" class="form-control" i>
                </div>
                <div class="text-center" style="margin-top:6%">
                  <p>رمزعبور را فراموش کرده اید؟<a href="repass.php">  بازیابی رمزعبور</a></p>
                  <div class="">
                    <input type="submit" class="btn" name="login" value="ورود">
                  </div>
                </div>
                <div class="text-center" style="margin-top:10%">
                  <div class="text-right"><label class="form-control-label">آیا حساب کاربری ندارید؟</label></div>
                  <div class="">
                    <input type="submit" class="btn btn2" name="signup" value="نام نویسی">
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <div style="margin: auto;display: block;" class="col d-none d-md-block">
        <img class="d-block img-fluid" src="pics/2.jpg" alt="">
      </div>
    </div>
    <a style="" href="mainpage.php" data-toggle="tooltip" title="BookClub.com">بازگشت به صفحه اصلی</a>
  </div>
</div>
<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
})
</script>
</body>
</html>
