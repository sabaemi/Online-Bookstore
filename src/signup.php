<!DOCTYPE html>
<html lang="fa">
<head>
  <title>BookClubSignup</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/signupcss.css">

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
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submit1'])) {
  if(!empty($_POST["username"])){
    $user = test_input($_POST["username"]);
    $nn="SELECT EXISTS(SELECT * FROM User WHERE username ='".$user."')";
    $re = $conn->query($nn);
    $r = $re->fetch_array();
    if($r[0]!=0){
      echo "<script>alert('این نام کاربری قبلا استفاده شده است');</script>";
    }
    else{
      if (empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["YearOfBirth"])|| empty($_POST["email"]) || empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["ques"]) || empty($_POST["answr"]) ) {
        //$err = "all fields are required";
        echo "<script>alert('لطفا تمام قسمت ها را وارد نمایید');</script>";
    } 
    //$email = test_input($_POST["email"]);
    else if (!filter_var($email= test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
      //$err = "Invalid email format";
      echo "<script>alert('ایمیل وارد شده نامعتبر است');</script>";
    }
    else if(preg_match('/[A-Za-z]/', $_POST["password"]) && preg_match('/[0-9]/', $_POST["password"]) && strlen($_POST["password"])> 7) {
    
        $firstName = test_input($_POST["firstName"]);
        $lastName = test_input($_POST["lastName"]);
        $YearOfBirth = test_input($_POST["YearOfBirth"]);
        $email = test_input($_POST["email"]);
        $user = test_input($_POST["username"]);
        $pass = test_input($_POST["password"]);
        $question = test_input($_POST["ques"]);
        $answer = test_input($_POST["answr"]);
    
        //////
        $sql = "INSERT INTO User (username,pass,userType,email) VALUES ('$user','$pass','B','$email')";
        $conn->query($sql);
        $sql = "INSERT INTO QuestionsList (question,username,answer) VALUES ('$question','$user','$answer')";
        $conn->query($sql);
        $sql = "INSERT INTO Buyer (`firstName`, `lastName`, `YearOfBirth`, `username`, `userType`) 
        VALUES ('$firstName', '$lastName', '$YearOfBirth', '$user', 'B')";
         if ($conn->query($sql) === TRUE) {
        echo "<script>alert('خریدار گرامی، ثبت نام با موفقیت انجام شد');
        window.location.href='login.php';</script>";
        } else {
        echo "Error: " . $conn->error;
        }
    }
        else{
          echo "<script>alert('رمزعبور واردشده نامناسب است');</script>";
        }
    }
  }
  else echo "<script>alert('لطفا تمام قسمت ها را وارد نمایید');</script>";
 }

 if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submit2'])) {
  if (empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["storeName"]) || empty($_POST["address"])|| empty($_POST["storeCode"])|| empty($_POST["email"]) || empty($_POST["username"]) || empty($_POST["password"]) || empty($_POST["ques"]) || empty($_POST["answr"]) ) {
    echo "<script>alert('لطفا تمام قسمت ها را وارد نمایید');</script>";
} 
else if (!filter_var($email= test_input($_POST["email"]), FILTER_VALIDATE_EMAIL)) {
  echo "<script>alert('ایمیل وارد شده نامعتبر است');</script>";
}
else if(preg_match('/[A-Za-z]/', $_POST["password"]) && preg_match('/[0-9]/', $_POST["password"]) && strlen($_POST["password"])> 7) {

    $firstName = test_input($_POST["firstName"]);
    $lastName = test_input($_POST["lastName"]);
    $storeName = test_input($_POST["storeName"]);
    $address = test_input($_POST["address"]);
    $storeCode = test_input($_POST["storeCode"]);
    $email = test_input($_POST["email"]);
    $user = test_input($_POST["username"]);
    $pass = test_input($_POST["password"]);
    $question = test_input($_POST["ques"]);
    $answer = test_input($_POST["answr"]);

    $sql = "INSERT INTO User (username,pass,userType,email) VALUES ('$user','$pass','S','$email')";
    $conn->query($sql);
    $sql = "INSERT INTO QuestionsList (question,username,answer) VALUES ('$question','$user','$answer')";
    $conn->query($sql);
    $sql = "INSERT INTO Seller (`storeName`,`firstName`, `lastName`, `storeCode`,`adress`, `username`, `userType`, `checkType`) 
    VALUES ('$storeName','$firstName', '$lastName','$storeCode', '$address', '$user', 'S','Checking')";
     if ($conn->query($sql) === TRUE) {
    echo "<script>alert('فروشنده گرامی، ثبت نام با موفقیت انجام شد');
    window.location.href='login.php';</script>";
    } else {
    echo "Error: " . $conn->error;
    }
}
    else{
      echo "<script>alert('رمزعبور واردشده نامناسب است');</script>";
    }
 }
?>
<?php
// if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['signup'])){
//   header("Location: signup2.php");
// }
?>
<div class="container">
  <div class="vasat">
    <div style="height:100%;margin-bottom:30px;" class="row">
      <div style="margin-top:2%; width:100%;" class="col">
        <span style="margin-bottom:5%;" class="navbar-brand"><img class="d-block img-fluid" src="pics/u2.png" alt=""></span>
        <!-- <div class="row">
          <div class="col"> -->
          <div class="mynav">
            <ul dir="rtl" class="nav nav-tabs nav-justified" id="myTab" role="tablist">
            <li class="nav-item nav-item1">
              <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">خریدار</a>
            </li>
            <li class="nav-item nav-item2">
              <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">فروشنده</a>
            </li>
          </ul>
        </div>
            <div class="myform">
            
          <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
          <form dir="rtl" class="text-right form1" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
          <div class="row">
            <div class="col">
            <div class="form-group">
                  <label class="form-control-label">نام</label>
                  <input type="text" class="form-control" name="firstName">
                </div>
            </div>
            <div class="col">
            <div class="form-group">
                  <label class="form-control-label">نام خانوادگی</label>
                  <input type="text" class="form-control" name="lastName">
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
            <div class="form-group">
                  <label class="form-control-label">سال تولد</label>
                  <input type="number" class="form-control" name="YearOfBirth">
                </div>
            </div>
            <div class="col">
            <div class="form-group">
                  <label class="form-control-label">ایمیل</label>
                  <input type="text" class="form-control" name="email">
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
                  <label class="form-control-label">رمزعبور</label>
                  <input type="password" name="password" class="form-control" i>
                </div>
            </div>
          </div>
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
          <div class="row btn-box1">
            <div class="col">
            <div class="form-group">
            <input type="submit" class="btn" name="submit1" value="ثبت نام">
                </div>
            </div>
            <div class="col">
            <div class="form-group link-box1">
            <p>حساب کاربری دارید؟<a href="login.php">   ورود</a></p>
                </div>
            </div>
          </div>
              </form>
          </div>
          <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
          <form dir="rtl" class="text-right form2" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
          <div class="row">
            <div class="col">
            <div class="form-group">
                  <label class="form-control-label">نام</label>
                  <input type="text" class="form-control" name="firstName">
                </div>
            </div>
            <div class="col">
            <div class="form-group">
                  <label class="form-control-label">نام خانوادگی</label>
                  <input type="text" class="form-control" name="lastName">
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
            <div class="form-group">
                  <label class="form-control-label">نام فروشگاه</label>
                  <input type="text" class="form-control" name="storeName">
                </div>
            </div>
            <div class="col">
            <div class="form-group">
                  <label class="form-control-label">آدرس فروشگاه</label>
                  <input type="text" class="form-control" name="address">
                </div>
            </div>
          </div>
          <div class="row">
            <div class="col">
            <div class="form-group">
                  <label class="form-control-label">شماره جواز کسب</label>
                  <input type="number" class="form-control" name="storeCode">
                </div>
            </div>
            <div class="col">
            <div class="form-group">
                  <label class="form-control-label">ایمیل</label>
                  <input type="text" class="form-control" name="email">
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
                  <label class="form-control-label">رمزعبور</label>
                  <input type="password" name="password" class="form-control" i>
                </div>
            </div>
          </div>
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
          <!-- style="margin-top:5%;" -->
          <div class="row btn-box">
            <div class="col">
            <div class="form-group">
            <input type="submit" class="btn" name="submit2" value="ثبت نام">
                </div>
            </div>
            <div class="col">
            <div class="form-group link-box">
            <p>حساب کاربری دارید؟<a href="login.php">   ورود</a></p>
                </div>
            </div>
          </div>
          
              </form>
          </div>
          </div>
              
            </div>
          <!-- </div>
        </div> -->
      </div>
      <div style="margin: auto;display: block;" class="col d-none d-md-block">
        <img class="d-block img-fluid" src="pics/signup.png" alt="">
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