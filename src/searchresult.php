<!DOCTYPE html>
<html lang="fa">
<head>
  <title>BookClubSearchResult</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/searchresultcss.css">

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
  $result = $_GET['for'];
}else{
echo "Url has no result";
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



  <br> <br> <br><br>
<p dir="rtl" class="container text-right" style="color:#1d4c8a; font-weight:bold; font-size:15px; ">نتایج برای <?php echo $result; ?> :</p>
  <div dir="rtl" class="container text-center" >
<ul class="list-group list-group-horizontal">
<?php
                            $names = "SELECT * FROM Book WHERE bookName LIKE '%".$result."%'";
                            $result = $conn->query($names);
                            $i = 0;
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc() and $i<4) {
                                    $i++;
                                  $code = $row["bookCode"];
                                  echo'
                                  
                                  <a href=bookpage.php?bookcode='.$row["bookCode"].' class="list-group-item flex-fill">
                                    <div class="card" style="max-width:200px; min-width:80px;">
                                      <img class="card-img-top" src="'.$row["img"].'" alt="Card image" style="width:100%">
                                      <div class="card-body">
                                        <p class="card-title">'.$row["bookName"].'</p>
                                        <p class="card-text">'.$row["author"].'</p>
                                      </div>
                                    </div>
                                  </a>';
                                  if($i==4){
                                    $i=0;
                                    echo'</ul>
                                    <ul class="list-group list-group-horizontal">
                                    ';
                                  }
                                  
                                }
                            }
                            else echo'نتیجه ای یافت نشد';
?>


</div>
</div>

<br> <br> <br><br>
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
</script>
</body>
</html>
