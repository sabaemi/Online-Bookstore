<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <title>BookClubBuyerPage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="css/buyerpagecss.css">

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
  if (empty($_POST["firstName"]) || empty($_POST["lastName"]) || empty($_POST["YearOfBirth"]) ) {
    echo "<script>alert('لطفا تمام قسمت ها را وارد نمایید');</script>";
} 
else{
    $firstName = test_input($_POST["firstName"]);
    $lastName = test_input($_POST["lastName"]);
    $YearOfBirth = test_input($_POST["YearOfBirth"]);

    $sql2="UPDATE Buyer SET firstName = '".$firstName."',lastName = '".$lastName."',YearOfBirth = '".$YearOfBirth."' WHERE username='".$user."'";
                if ($conn->query($sql2) === TRUE) {
                  echo "<script>alert('ویرایش اطلاعات با موفقیت انجام شد');</script>";
                }
              else {
                  echo "Error: " . $conn->error;
                  }
}
 }

 if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['delete'])) {
  foreach($_POST['delete'] as $value){
    $bcode = test_input($value);
                $sql2="DELETE FROM Likedbooks WHERE bookCode='".$bcode."' AND buyerUsername='".$user."' ";
                if ($conn->query($sql2) === TRUE) {
              }
              else {
                  echo "Error: " . $conn->error;
                  }
        }
      }
      if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['reqdelete'])) {
        foreach($_POST['reqdelete'] as $value){
          $bcode = test_input($value);
                      $sql2="DELETE FROM Bookreq WHERE bookCode='".$bcode."' AND buyerUsername='".$user."' ";
                      if ($conn->query($sql2) === TRUE) {
                    }
                    else {
                        echo "Error: " . $conn->error;
                        }
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
          <small style="white-space: pre;">خریدار</small>
          </div>
        </div>
        <ul class=" nav nav-tabs navbar-nav bd-navbar-nav py-5 mr-auto" dir="rtl" id="myTab" role="tablist">
          <li class="nav-item" style="text-align: right;"><a class="nav-link active" id="profile-tab" data-toggle="tab" href="#profile" aria-controls="profile" aria-selected="true">ویرایش پروفایل</a></li>
          <li class="nav-item" style="text-align: right;"><a class="nav-link" id="favorite-tab" data-toggle="tab" href="#favorite" aria-controls="favorite" aria-selected="false">علاقه مندی ها</a></li>
          <li class="nav-item" style="text-align: right;"><a class="nav-link" id="addresses-tab" data-toggle="tab" href="#addresses" aria-controls="addresses" aria-selected="false">آدرس های من</a></li>
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
        <div class="container" >
          <div class="vasat" style="">
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
                      <label class="form-control-label">سال تولد</label>
                      <input type="number" class="form-control" name="YearOfBirth">
                    </div>
                    <div class="btn-box">
                      <div class="form-group">
                        <input type="submit" class="btn" name="save" value="ذخیره تغییرات">
                      </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade show" id="favorite" role="tabpanel" aria-labelledby="favorite-tab">
                  <form dir="rtl" class="text-right form2" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                  <div class="table-responsive" style="height: 560px!important; overflow: auto;">
                  <table class="table" style="width:100%; text-align: right; margin-top:35px;">
                    <!-- <table class="table table-bordered"> -->
                      <thead>
                        <!-- <tr> -->
                        <tr style="border-top: hidden;">
                          <!-- <th scope="col">#</th> -->
                          <!-- <th scope="col">نام کتاب</th> -->
                          <th scope="col">کتاب های شما</th>
                          <th scope="col">نویسنده</th>
                          <th scope="col">قیمت</th>
                          <th scope="col">حذف</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $lik = "SELECT * FROM Likedbooks wHERE buyerUsername='".$user."'";
                          $lresult = $conn->query($lik);
                          if ($lresult->num_rows > 0) {
                              while($lrow = $lresult->fetch_assoc()){
                                $code=$lrow["bookCode"];
                            $names = "SELECT * FROM Book wHERE bookCode='".$code."'";
                            $result = $conn->query($names);
                            // $i = 0;
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  // $i++;
                                  echo'
                                  <tr>
                                  
      <th scope="row" width="35%" >
      <div style="display:flex!important; float:right;"><img  style="margin-left:15px!important;" class="bookimage" src="'.$row["img"].'" alt="Book image" style="width:100%"><span class="imgtxt">'.$row["bookName"].'</span></div>
      </th>
      <td width="20%"><div style="margin-top:61.75px;">'.$row["author"].'</div></td>
      <td width="20%"><div style="margin-top:61.75px;">'.$row["cost"].'</div></td>
      <td width="20%"><div style="margin-top:59px;"><button type="submit" class="btn-link cancel" name="delete[]" value="'.$row["bookCode"].'"><i class="bi bi-x-circle-fill"></i></button></div></td>
    </tr>';
                                  // echo'
                                  // <tr>
                                    
                                  //   <td>'.$row["img"].'</td>
                                  //   <td>'.$row["bookName"].'</td>
                                    
                                  //   <td>'.$row["cost"].'</td>
                                  // </tr>';
                                }
                            }
                          }
                        }
                          ?>
                      </tbody>
                    </table>
                    </div>
                    <!-- <div class="btn-box">
                      <div class="form-group">
                        <input type="submit" class="btn btn2" name="submit" value="ثبت کتاب">
                      </div>
                    </div> -->
                  </form>
                </div>
                <div class="tab-pane fade show" id="addresses" role="tabpanel" aria-labelledby="addresses-tab">
                  <form dir="rtl" class="text-right form2" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                  <div class="table-responsive" style="height: 560px!important; overflow: auto;">
                  <table class="table" style="width:100%; text-align: right; margin-top:35px;">
                      <thead>
                        <tr style="border-top: hidden;">
                          <!-- <th scope="col">#</th> -->
                          <th scope="col">استان</th>
                          <th scope="col">شهر</th>
                          <th scope="col">آدرس</th>
                          <th scope="col">نام گیرنده</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $names = "SELECT * FROM Addresses wHERE buyerUsername='".$user."'";
                            $result = $conn->query($names);
                            // $i = 0;
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  // $i++;
                                  echo'
                                  <tr>
                                  
                                  <td width="20%"><div style="margin-top:61.75px;">'.$row["ostan"].'</div></td>
      <td width="20%"><div style="margin-top:61.75px;">'.$row["city"].'</div></td>
      <td width="20%"><div style="margin-top:61.75px;">'.$row["addres"].'</div></td>
      <td width="20%"><div style="margin-top:61.75px;">'.$row["buyername"].'</div></td>
    </tr>';
                          }
                        }
                          ?>
                      </tbody>
                    </table>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade show" id="requestedbook" role="tabpanel" aria-labelledby="requestedbook-tab">
                  <form dir="rtl" class="text-right form2" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                  <div class="table-responsive" style="height: 560px!important; overflow: auto;">
                  <table class="table" style="width:100%; text-align: right; margin-top:35px;">
                      <thead>
                        <tr style="border-top: hidden;">
                          <!-- <th scope="col">#</th> -->
                          <th scope="col">کتاب های شما</th>
                          <th scope="col">نویسنده</th>
                          <th scope="col">حذف</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          $lik = "SELECT * FROM Bookreq wHERE buyerUsername='".$user."'";
                          $lresult = $conn->query($lik);
                          // $i = 0;
                          if ($lresult->num_rows > 0) {
                              while($lrow = $lresult->fetch_assoc()){
                                $code=$lrow["bookCode"];
                            $names = "SELECT * FROM Book wHERE bookCode='".$code."'";
                            $result = $conn->query($names);
                            
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  // $i++;
                                  echo'
                                  <tr>
                                  
      <th scope="row" width="35%" >
      <div style="display:flex!important; float:right;"><img  style="margin-left:15px!important;" class="bookimage" src="'.$row["img"].'" alt="Book image" style="width:100%"><span class="imgtxt">'.$row["bookName"].'</span></div>
      </th>
      <td width="20%"><div style="margin-top:61.75px;">'.$row["author"].'</div></td>
      <td width="20%"><div style="margin-top:59px;"><button type="submit" class="btn-link cancel" name="reqdelete[]" value="'.$row["bookCode"].'"><i class="bi bi-x-circle-fill"></i></button></div></td>
    </tr>';
                                }
                            }
                          }
                        }
                          ?>
                      </tbody>
                    </table>
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
