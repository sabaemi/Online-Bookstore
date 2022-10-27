<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <title>BookClubSellerPage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/sellerpagecss.css">

</head>
<?php
  session_start();
  $user = $_SESSION['username'];
?>

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


if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['save'])) {
  if (empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["storeCode"]) || empty($_POST["addres"]) ) {
    echo "<script>alert('لطفا تمام قسمت ها را وارد نمایید');</script>";
} 
else{
    $firstName = test_input($_POST["firstName"]);
    $lastName = test_input($_POST["lastName"]);
    $storeCode = test_input($_POST["storeCode"]);
    $addres = test_input($_POST["addres"]);

    $sql2="UPDATE Seller SET firstName = '".$firstName."',lastName = '".$lastName."',storeCode = '".$storeCode."',adress = '".$addres."' WHERE username='".$user."'";
                if ($conn->query($sql2) === TRUE) {
                  echo "<script>alert('ویرایش اطلاعات با موفقیت انجام شد');</script>";
                }
              else {
                  echo "Error: " . $conn->error;
                  }
}
 }

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submit'])) {
  if (empty($_POST["bookCode"]) || empty($_POST["bookName"]) || empty($_POST["author"]) || empty($_POST["translator"])|| empty($_POST["cat"])|| empty($_POST["cost"]) || empty($_POST["publisher"]) || empty($_POST["publishYear"]) || empty($_POST["noPages"]) || empty($_POST["shabak"]) || empty($_POST["stock"]) || empty($_POST["pubSerial"]) || empty($_POST["about"]) || empty($_POST["img"]) ) {
    echo "<script>alert('لطفا تمام قسمت ها را وارد نمایید');</script>";
} 
else{
    $bookCode = test_input($_POST["bookCode"]);
    $bookName = test_input($_POST["bookName"]);
    $author = test_input($_POST["author"]);
    $translator = test_input($_POST["translator"]);
    $cat = test_input($_POST["cat"]);
    $cost = test_input($_POST["cost"]);
    $publisher = test_input($_POST["publisher"]);
    $publishYear = test_input($_POST["publishYear"]);
    $noPages = test_input($_POST["noPages"]);
    $shabak = test_input($_POST["shabak"]);
    $stock = test_input($_POST["stock"]);
    $pubSerial = test_input($_POST["pubSerial"]);
    $about = test_input($_POST["about"]);
    $img = test_input($_POST["img"]);

    $sql1 = "SELECT storeName FROM Seller  Where username='".$user."' ";
    $result1 = $conn->query($sql1);
    while($row1 = $result1->fetch_assoc()) $storeName=$row1["storeName"];
    
    $sql = "INSERT INTO Book (bookCode, bookName, sellerUsername,storeName, author, translator, cat, cost, publisher, publishYear, noPages, shabak, stock, about, img, pubSerial, report) 
            VALUES ('$bookCode', '$bookName', '$user','$storeName', '$author', '$translator', '$cat', '$cost', '$publisher', '$publishYear', '$noPages', '$shabak', '$stock', '$about', '$img', '$pubSerial', 'Fine') ";
    $conn->query($sql);
    //  if ($conn->query($sql) === TRUE) {
       echo "<script>alert('فروشنده گرامی، ثبت کتاب با موفقیت انجام شد');</script>";
    // } else {
    // echo "Error: " . $conn->error;
    // }
}
 }

 if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["addnew"] ) ){
    
  if(!empty($_POST['checkm'])) {
    if (empty($_POST["numberb"])){
      echo "<script>alert('لطفا تعداد را وارد نمایید');</script>";
    }
    else{
      foreach($_POST['checkm'] as $value){
        $numberb = test_input($_POST["numberb"]);
        $mmname = test_input($value);
            $sql ="DELETE FROM Bookreq WHERE bookCode='".$mmname."'";
            if ($conn->query($sql) === TRUE) {
              $sql2="UPDATE Book SET stock = '".$numberb."' WHERE bookCode='".$mmname."'";
                if ($conn->query($sql2) === TRUE) {
                  echo "<script>alert('ثبت تعداد با موفقیت انجام شد');</script>";
                }
              else {
                  echo "Error: " . $conn->error;
                  }
                // echo "<script>alert('شما کتاب $value را حذف کردید');</script>";
            }
            else {
                echo "Error: " . $conn->error;
                }
    }
    }
}
else{
  echo "<script>alert('شما کتابی انتخاب نکردید');</script>";
}
}
?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['signup'])){
  header("Location: signup.php");
}
?>
<div id="app">
  <div class="main-container" id="wrapper">
    <div class="d-flex vh-100">

      <!-- Sidebar -->
      <aside id="sidebar" class="side-panel d-flex flex-column h-100">
        <a id="navTrigger" class="d-lg-none nav-trigger" role="button" title="open/close">
          <span class="hamburger">
							<span class="hamburger-icon"></span>
          </span>
        </a>
        <div class="row sidebar-heading mt-5 ml-auto" style="margin-bottom:1.8rem;">
          <div class="col">
            <img class="d-block img-fluid" 
            src="pics/user.png"
            alt="">
          </div>
          <div class="col" style="color:white; text-align: right;" >
            <h5 class="mt-3"><?php echo $user ;?>
          </h5>
          <small style="white-space: pre;">فروشنده</small>
          </div>
        </div>
        <ul class=" nav nav-tabs navbar-nav bd-navbar-nav py-5 mr-auto" dir="rtl" id="myTab" role="tablist">
          <li class="nav-item" style="text-align: right;"><a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile" aria-selected="true">ویرایش پروفایل</a></li>
          <li class="nav-item" style="text-align: right;"><a class="nav-link" id="addbook-tab" data-toggle="tab" href="#addbook" aria-controls="addbook" aria-selected="false">ثبت کتاب</a></li>
          <li class="nav-item" style="text-align: right;"><a class="nav-link" id="salestatus-tab" data-toggle="tab" href="#salestatus" aria-controls="salestatus" aria-selected="false">وضعیت فروش</a></li>
          <li class="nav-item" style="text-align: right;"><a class="nav-link" id="requestedbook-tab" data-toggle="tab" href="#requestedbook" aria-controls="requestedbook" aria-selected="false">کتاب های درخواست شده</a></li>
        </ul>
        <div dir="rtl" style="color:white; text-align: right;" id="footer" class="mt-auto">
          <div class="row">
            <div class="col" style="padding:0px;">
            <small style="white-space: pre;">بوک کلاب  |  سامانه خرید و فروش کتاب</small>
            </div>
          </div>
        </div>
      </aside>

      <!-- Content -->
      <div id="content" class="w-100">
        <div class="container">
          <div class="vasat">
            <div class="myform">
              <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                  <form dir="rtl" class="text-right form1" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                    <div class="form-group">
                      <label class="form-control-label">نام</label>
                      <input type="text" class="form-control" name="firstName">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">نام خانوادگی</label>
                      <input type="text" class="form-control" name="lastName">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">شماره جواز کسب</label>
                      <input type="number" class="form-control" name="storeCode">
                    </div>
                    <div class="form-group">
                      <label class="form-control-label">آدرس فروشگاه</label>
                      <input type="text" class="form-control" name="addres">
                    </div>
                    <div class="btn-box">
                      <div class="form-group">
                        <input type="submit" class="btn" name="save" value="ذخیره تغییرات">
                      </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade show" id="addbook" role="tabpanel" aria-labelledby="addbook-tab">
                <form dir="rtl" class="text-right form2" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                <?php
  $ff="SELECT EXISTS(SELECT * FROM Seller WHERE checkType='ok' AND username='".$user."')";
    $fre = $conn->query($ff);
    $fr = $fre->fetch_array();
    if($fr[0]!=0){
echo'
                  
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">کد کتاب</label>
                          <input type="number" class="form-control" name="bookCode">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">نام کتاب</label>
                          <input type="text" class="form-control" name="bookName">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">نویسنده</label>
                          <input type="text" class="form-control" name="author">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">مترجم</label>
                          <input type="text" class="form-control" name="translator">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">موضوع</label>
                          <input type="text" class="form-control" name="cat">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">قیمت به تومان</label>
                          <input type="number" class="form-control" name="cost">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                    <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">انتشارات</label>
                          <input type="text" class="form-control" name="publisher">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">سال انتشار</label>
                          <input type="number" class="form-control" name="publishYear">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">تعداد صفحه</label>
                          <input type="number" class="form-control" name="noPages">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">شابک</label>
                          <input type="number" class="form-control" name="shabak">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">تعداد موجودی</label>
                          <input type="number" class="form-control" name="stock">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">نوبت چاپ</label>
                          <input type="number" class="form-control" name="pubSerial">
                        </div>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">درباره کتاب</label>
                          <input type="text" class="form-control" name="about">
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">لینک تصویر</label>
                          <input type="text" class="form-control" name="img">
                        </div>
                      </div>
                    </div>
                    <div class="btn-box">
                      <div class="form-group">
                        <input type="submit" class="btn btn2" name="submit" value="ثبت کتاب">
                      </div>
                    </div>
                  </form>';}
                  else{ echo "<br><br>";
                    echo "اطلاعات شما هنوز به تایید ادمین نرسیده";}
                  ?>
                </div>
                <div class="tab-pane fade show" id="salestatus" role="tabpanel" aria-labelledby="salestatus-tab">
                  <form dir="rtl" class="text-right form2" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                  <?php
                                $tcost=0;
                            $names = "SELECT * FROM Sold wHERE sellerUsername='".$user."'";
                            $result = $conn->query($names);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  $tcost=$tcost+$row["cost"];
                          }
                        }
                        echo'<div style="font-size:23px;margin-top:61.75px;">کل هزینه های دریافتی شما '.$tcost.' تومان است.</div>';
                          ?>
                  </form>
                </div>
                <div class="tab-pane fade show" id="requestedbook" role="tabpanel" aria-labelledby="requestedbook-tab">
                  <form dir="rtl" class="text-right form2" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                  <div class="table-responsive" style="height: 360px!important; overflow: auto;">
                  <table class="table" style="width:100%; text-align: right; margin-top:35px;">
                    <!-- <table class="table table-bordered"> -->
                      <thead>
                        <!-- <tr> -->
                        <tr style="border-top: hidden;">
                          <!-- <th scope="col">#</th> -->
                          <th scope="col">انتخاب</th>
                          <th scope="col">نام کتاب</th>
                          <th scope="col">کد کتاب</th>
                          <th scope="col">نویسنده</th>
                          <th scope="col">موضوع</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $lik = "SELECT * FROM Bookreq";
                          $lresult = $conn->query($lik);
                          if ($lresult->num_rows > 0) {
                              while($lrow = $lresult->fetch_assoc()){
                                $code=$lrow["bookCode"];
                            $names = "SELECT * FROM Book wHERE bookCode='".$code."' AND sellerUsername='".$user."'";
                            $result = $conn->query($names);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  echo'
                                  <tr>
      <td width="20%"><div style="margin-top:59px;"><input type="checkbox" class="checkbox" name="checkm[]" value="'.$row["bookCode"].'"></div></td>
      <th scope="row" width="35%" >
      <div style="display:flex!important; float:right;"><img  style="margin-left:15px!important;" class="bookimage" src="'.$row["img"].'" alt="Book image" style="width:100%"><span class="imgtxt">'.$row["bookName"].'</span></div>
      </th>
      <td width="20%"><div style="margin-top:61.75px;">'.$code.'</div></td>
      <td width="20%"><div style="margin-top:61.75px;">'.$row["author"].'</div></td>
      <td width="20%"><div style="margin-top:61.75px;">'.$row["cat"].'</div></td>
    </tr>';
                                }
                            }
                          }
                        }
                          ?>
                      </tbody>
                    </table>
                    </div>
                    <!-- <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <label class="form-control-label">درباره کتاب</label>
                          <input type="text" class="form-control" name="about">
                        </div>
                      </div>
                    </div> -->
                    <br><br>
                    <div class="btn-box">
                    <div class="form-group">
                          <label class="form-control-label">تعداد</label>
                          <input type="number" class="form-control" name="numberb">
                        </div>
                      <div class="form-group">
                        <input type="submit" class="btn btn2" name="addnew" value="افزایش موجودی">
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div style="text-align: center;"><a  href="mainpage.php" data-toggle="tooltip" title="BookClub.com">بازگشت به صفحه اصلی</a></div>
        </div>
      </div>  
    </div>
  </div>
</div>

<script>
  $(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
})

var sidebar = $("#sidebar");
var hamburger = $('#navTrigger');

hamburger.click(function(e) {
  e.preventDefault();
  $(this).toggleClass('is-active');
  // This will add `sidebar-opened`
  $('#wrapper').toggleClass("sidebar-opened");
  // Remove magin left
  sidebar.toggleClass('mr-0');
});
</script>
</body>
</html>
