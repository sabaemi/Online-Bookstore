<!DOCTYPE html>
<html lang="fa">
<head>
  <title>BookClubPasswordRecovery</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/repasscss.css">

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
?>
<?php
// if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['signup'])){
//   header("Location: signup.php");
// }
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['submit'])){
        if (empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["ques"]) || empty($_POST["answr"]) ) {
          echo "<script>alert('لطفا تمام قسمت ها را وارد نمایید');</script>";
      }
        else{
          // if(!empty($_POST["fFtn"])){
    $user = test_input($_POST["username"]);
    $pass = test_input($_POST["password"]);
    $question = test_input($_POST["ques"]);
    $answer = test_input($_POST["answr"]);

          //   $fFtn = $_POST["fFtn"];
          //   $fUsername = test_input($_POST["fUsername"]);
          // $fPass = test_input($_POST["fPass"]);
          // $fhashed_password = password_hash($fpass, PASSWORD_DEFAULT);

            $sql = "SELECT * FROM questionslist WHERE username ='".$user."' and question ='".$question."' ";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);
            $rightAnswer = $row['answer'];
            if($answer == $rightAnswer){
              if(preg_match('/[A-Za-z]/', $_POST["password"]) && preg_match('/[0-9]/', $_POST["password"]) && strlen($_POST["password"])> 7){
              $sql = "UPDATE User SET pass ='$pass' WHERE username ='$user' ";

              $result = mysqli_query($conn, $sql);
              //echo "password changed";
              echo "<script>alert('رمزعبور با موفقیت تغییر کرد');</script>";
              }
              else{
                echo "<script>alert('رمزعبور واردشده نامناسب است');</script>"; 
              }
            }
            else{
              echo "<script>alert('سوال یا پاسخ امنیتی نادرست است');</script>";
            }
          // }

          // else if(!empty($_POST["fColor"])){
          //   $fColor = $_POST["fColor"];
          //   $fUsername = test_input($_POST["fUsername"]);
          // $fPass = test_input($_POST["fPass"]);
          // $fhashed_password = password_hash($fpass, PASSWORD_DEFAULT);
          //   $sql = "SELECT * FROM questionslist WHERE username ='".$fUsername."' and question ='color' ";
          //   $result = mysqli_query($conn, $sql);
          //   $row = mysqli_fetch_assoc($result);
          //   $rightAnswer = $row['answer'];
          //   if($fColor == $rightAnswer){
          //     if(preg_match('/[A-Za-z]/', $_POST["fPass"]) && preg_match('/[0-9]/', $_POST["fPass"]) && strlen($_POST["fPass"])> 7){
          //     $sql = "UPDATE User SET pass ='$fPass', hashedpass='$fhashed_password' WHERE username ='$fUsername'";
          //     $result = mysqli_query($conn, $sql);
          //     //echo "password changed";
          //     echo "<script>alert('password changed');
          //       window.location.href='main.php';</script>";
          //     }
          //     else{
          //       echo "<script>alert('weak password');</script>"; 
          //     }
          //   }
          //   else{
          //     echo "<script>alert('password recovery question is wrong');</script>";
          //   }
          // }

          
        }
  
      }

?>
<div class="container">
  <div class="vasat">
    <div style="height:100%;margin-bottom:30px;" class="row">
      <div style="margin-top:2%; width:100%;" class="col">
        <span style="margin-bottom:5%;" class="navbar-brand"><img class="d-block img-fluid" src="pics/u2.png" alt=""></span>
        <!-- <div class="row">
          <div class="col"> -->
            <div class="myform">
          <form dir="rtl" class="text-right" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
 
          <div class="row">
            <div class="col">
            <div class="form-group">
            <label class="form-control-label">سوال امنیتی</label>
            <select  class="form-control" name="ques">
            <option class="hidden"  selected disabled></option>
                      <option style="font-weight:normal; font-size:12px;" class="hidden"  disabled>یکی از سوالات را برای بازیابی رمزعبور انتخاب کنید</option>
                      <option style="font-weight:normal; font-size:12px;" value='ftn'>معلم مورد علاقه شما چه نام دارد؟</option>
                      <option style="font-weight:normal; font-size:12px;" value='color'>رنگ مورد علاقه شما چیست؟</option>
                  </select>
                </div>
            </div>
            <div class="col">
            <div class="form-group">
                  <label class="form-control-label">پاسخ امنیتی</label>
                  <input type="text" class="form-control" name="answr">
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
            <div class="form-group">
                  <label class="form-control-label">نام کاربری</label>
                  <input type="text" class="form-control" name="username">
                </div>
            </div>
            <div class="col">
            <div class="form-group">
                  <label class="form-control-label">رمزعبور جدید</label>
                  <input type="password" name="password" class="form-control" i>
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
            <div class="form-group">
            <input type="submit" class="btn" name="submit" value="بازیابی رمزعبور">
                </div>
            </div>
            <div class="col">
            <div class="form-group">
                </div>
            </div>
          </div>
              </form>
              
            </div>
          <!-- </div>
        </div> -->
      </div>
      <div style="margin: auto;display: block; " class="col d-none d-md-block">
        <img style="width:65%;height:auto; margin:auto;" class="d-block img-fluid" src="pics/8.png" alt="">
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