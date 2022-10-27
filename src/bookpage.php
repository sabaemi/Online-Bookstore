<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <title>BookClubBookPage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="css/bookpagecss.css">

<?php session_start(); ?>

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
if($_GET){
  $code = $_GET['bookcode'];     
}else{
echo "Url has no bookcode";
}

  if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['like'])) {
    if(isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username']!='admin99'){
      $user=test_input($_SESSION['username']);
      $nn="SELECT EXISTS(SELECT * FROM User WHERE userType='S' AND username='".$user."')";
        $re = $conn->query($nn);
        $r = $re->fetch_array();
        if($r[0]==0){
        $nn="SELECT EXISTS(SELECT buyerUsername FROM Likedbooks WHERE bookCode='".$code."' AND buyerUsername='".$user."')";
        $re = $conn->query($nn);
        $r = $re->fetch_array();
        if($r[0]==0){
        $date=date("Y/m/d");
        $sql2 = "INSERT INTO `Likedbooks` (`buyerUsername`, `bookCode`, `addDate`) VALUES ('$user' ,'$code','$date')";
            if ($conn->query($sql2) === TRUE) {
                echo "<script>alert('کتاب به لیست علاقه مندی اضافه شد');</script>";
            }
            else {
                echo "Error: " . $conn->error;
                }
            }
            else{
                echo "<script>alert('شما قبلا این کتاب را به لیست علاقه مندی اضافه کردید');</script>";
            }
          }
          else{
            echo "<script>alert('لطفا با حساب کاربری خریدار وارد شوید');</script>";
          }
        }
        else{
          echo "<script>alert('لطفا ابتدا وارد حساب کاربری شوید');</script>";
        }
 }

 if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['report'])) {
  if(isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username']!='admin99'){
    $user=test_input($_SESSION['username']);
    $nn="SELECT EXISTS(SELECT * FROM User WHERE userType='S' AND username='".$user."')";
      $re = $conn->query($nn);
      $r = $re->fetch_array();
      if($r[0]==0){
      $sql2="UPDATE Book SET report = 'report' WHERE bookCode='".$code."' ";
                if ($conn->query($sql2) === TRUE) {
                  echo "<script>alert('کتاب به ادمین گزارش شد');</script>";
              }
          else {
              echo "Error: " . $conn->error;
              }
        }
        else{
          echo "<script>alert('لطفا با حساب کاربری خریدار وارد شوید');</script>";
        }
      }
      else{
        echo "<script>alert('لطفا ابتدا وارد حساب کاربری شوید');</script>";
      }
}

 if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['addtocart'])) {
  if(isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username']!='admin99'){
    $user=test_input($_SESSION['username']);
    $nn="SELECT EXISTS(SELECT * FROM User WHERE userType='S' AND username='".$user."')";
    $re = $conn->query($nn);
    $r = $re->fetch_array();
    if($r[0]==0){
    ////////////////
    $nn="SELECT EXISTS(SELECT buyerUsername FROM Cart WHERE bookCode='".$code."' AND buyerUsername='".$user."')";
      $re = $conn->query($nn);
      $r = $re->fetch_array();
      if($r[0]!=0){
        $names="SELECT * FROM Cart WHERE bookCode='".$code."' AND buyerUsername='".$user."' ";
        $result = $conn->query($names);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $count=$row["numOrder"]+1;
                $sql2="UPDATE Cart SET numOrder = '".$count."' WHERE bookCode='".$code."' AND buyerUsername='".$user."'";
                if ($conn->query($sql2) === TRUE) {
                  echo "<script>alert('کتاب دوباره به سبد خرید اضافه شد');</script>";
              }
              else {
                  echo "Error: " . $conn->error;
                  }
            }
          }
        }
    ////////////////
    else{
        $names = "SELECT * FROM Book WHERE bookCode='".$code."' ";
        $result = $conn->query($names);
        if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
            $date=date("Y/m/d");
            $bookName=$row["bookName"];
            $img=$row["img"];
            $seller=$row["sellerUsername"];
            $cost=$row["cost"];
            $sql2 = "INSERT INTO `cart` (`buyerUsername`, `bookCode`, `oDate`,`bookName`,`img`,`sellerUsername`,`cost`,`numOrder`) VALUES ('$user' ,'$code','$date','$bookName','$img','$seller','$cost','1')";
            if ($conn->query($sql2) === TRUE) {
                echo "<script>alert('کتاب به سبد خرید اضافه شد');</script>";
            }
            else {
              echo "Error: " . $conn->error;
            }
           }
          }
        }
        }
        else{
          echo "<script>alert('لطفا با حساب کاربری خریدار وارد شوید');</script>";
        }
      //////////////
          }
      else{
        echo "<script>alert('لطفا ابتدا وارد حساب کاربری شوید');</script>";
      }
}


if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['requestb'])) {
  if(isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username']!='admin99'){
    $user=test_input($_SESSION['username']);
    $nn="SELECT EXISTS(SELECT * FROM User WHERE userType='S' AND username='".$user."')";
    $re = $conn->query($nn);
    $r = $re->fetch_array();
    if($r[0]==0){
      $sql2 = "INSERT INTO `Bookreq` (`buyerUsername`, `bookCode`) VALUES ('$user' ,'$code')";
            if ($conn->query($sql2) === TRUE) {
                echo "<script>alert('کتاب به لیست درخواست اضافه شد');</script>";
            }
            else {
              echo "Error: " . $conn->error;
            }
    }
    else{
          echo "<script>alert('لطفا با حساب کاربری خریدار وارد شوید');</script>";
    }
    }
    else{
        echo "<script>alert('لطفا ابتدا وارد حساب کاربری شوید');</script>";
      }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['search'])) {
  if (!empty($_POST["searchtxt"])) {
    $searchtxt=test_input($_POST['searchtxt']);
    echo "<script>window.location.href='searchresult.php?for=$searchtxt';</script>";
  }
}
?>

<nav dir="rtl" class="navbar navbar-expand-md navbar-light bg-light navbar-custom">
    <a style="margin-right:30px" class="navbar-brand" href="mainpage.php"><img class="d-block img-fluid" src="pics/u2.png" alt=""></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item ml-auto">
                <a id="btag" class="nav-link" href="login.php">ورود / ثبت نام</a>
            </li>
            <li class="nav-item ml-auto">
                <a id="btag" class="nav-link" href="cart.php">سبد خرید</a>
            </li>
            <li class="nav-item ml-auto">
              <form id="btag" class="form-inline" dir="ltr" method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                <div class="input-group">
                  <div  class="input-group-prepend">
                    <button type="submit" class="btn" name="search">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
                      <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/>
                    </svg>
                  </button>
                  </div>
                  <input type="text" class="form-control" dir="rtl" name="searchtxt" placeholder="جستجو کنید ...">
                </div>    
             </form>
            </li>
        </ul>
    </div>
</nav>

<?php
$names = "SELECT * FROM Book WHERE bookCode='".$code."' ";
$result = $conn->query($names);
?>
<br><br><br>
<div dir="rtl" class="container" style="background-color:white;">
<form id="form1" method="POST" action=<?php 'bookpage.php?bookcode='.$code ?>>
  <div class="row">
    <?php
      if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      echo'
      <div class="col-md-4">
        <img class="bookimage" src="'.$row["img"].'" alt="Book image" style="width:100%">
      </div>
      <div class="col">
        <div class="row">
          <div class="col-sm-6" style="padding-right:30px;">
            <div class="info" style="">
              <p dir="rtl" class="text-right" style="color: #1e549c; font-weight:bold; font-size:20px; ">کتاب '.$row["bookName"].' <button type="submit" data-toggle="tooltip" title="افزودن به علاقه مندی" style="color: red;" id="swapHeart" class="swap btn-link" name="like"><i class="bi bi-heart-fill"></i></button>
              &nbsp;<button type="submit" data-toggle="tooltip" title="گزارش محتوا" style="color: black;" id="swapHeart" class="swap btn-link" name="report"><i class="bi bi-flag"></i></button>
              </p>
              <p dir="rtl" class="text-right">'.$row["cost"].' تومان</p>
      ';
    if($row["stock"]>0) echo'<p dir="rtl" class="text-right" style="color: green;">موجود <i class="bi bi-check2-circle"></i></p>'; else echo'<p dir="rtl" class="text-right" style="color: red;">ناموجود <i class="bi bi-x-circle"></i></p>';
    echo'
              <p dir="rtl" class="text-right">انتشارات: '.$row["publisher"].'</p>
              <p dir="rtl" class="text-right">نویسنده: '.$row["author"].'</p> ';
              if($row["stock"]>0) echo'<input type="submit" class="btn2" name="addtocart" value="افزودن به سبد خرید">'; else echo'<input type="submit" class="btn2" style="background-color:white; color:#1e549c;" name="requestb" value="درخواست کتاب">';
              echo'</div></div>';
    }
  }
    ?>
    <div class="col" style="padding-right:30px;">
    <div class="table-responsive" >
                    <table class="table "style="">
                      <tbody>
                          <?php
                          $names = "SELECT * FROM Book WHERE bookCode='".$code."' ";
                          $result = $conn->query($names);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  echo'
                                  <tr style="border-top: hidden;">
                                    <td style="">کد کتاب :</td>
                                    <td>'.$code.'</td>
                                  </tr>
                                  <tr>
                                    <td>مترجم :</td>
                                    <td>'.$row["translator"].'</td>
                                  </tr>
                                  <tr>
                                    <td>شابک :</td>
                                    <td>'.$row["shabak"].'</td>
                                  </tr>
                                  <tr>
                                    <td>تعداد صفحه :</td>
                                    <td>'.$row["noPages"].'</td>
                                  </tr>
                                  <tr>
                                    <td>سال انتشار :</td>
                                    <td>'.$row["publishYear"].'</td>
                                  </tr>
                                  <tr>
                                    <td>نوبت چاپ :</td>
                                    <td>'.$row["pubSerial"].'</td>
                                  </tr>';
                                  
                                }
                            }
                          ?>
                          </tbody>
                    </table>
                    </div>
    </div></div></div>
  </div>
                          </form>
  </div>
  <br><br><br>
  <div dir="rtl" class="container" style="background-color:white;">
    <?php
    $names = "SELECT * FROM Book WHERE bookCode='".$code."' ";
    $result = $conn->query($names);
    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      echo'
      <div class="descr">
    <p dir="rtl" class="text-right" style="color: #1e549c; font-weight:bold; ">معرفی کتاب '.$row["bookName"].'</p>
    <p dir="rtl" class="text-right">'.$row["about"].'</p></div>
    ';
    }
  }
    ?>
  </div>
<br><br><br>

<footer>
<div class="jumbotron text-center" style="margin-bottom:0 ;">
<br>
  <p dir="rtl">
  در بوک کلاب، بهترین و تحسین‌شده‌ترین کتاب‌ های سراسر دنیا در انواع سبک های گوناگون گرد هم آمده‌اند تا برای کسانی که تمایل به خرید کتاب های ارزشمند دارند، هیچ دغدغه‌ای وجود نداشته باشد.
  </p>
  <br>
  <p><a href="https://t.me/bookclub" data-toggle="tooltip" title="Visit the Channel">https://t.me/bookclub</a> :کانال تلگرام </p>
</div>
</footer>

<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
})

// jQuery(function($) {
//   $('#swapHeart').on('click', function() {
//     var $el = $(this),
//       textNode = this.lastChild;
//     $el.find('i').toggleClass('bi-heart bi-heart-fill');
//     $el.toggleClass('swap');
//   });
// });   
</script>
</body>
</html>
