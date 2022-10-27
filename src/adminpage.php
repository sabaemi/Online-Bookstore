<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <title>BookClubAdminPage</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/adminpagecss.css">

</head>
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

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["userbttn"] ) ){
  foreach($_POST['userbttn'] as $value){
      $fromuser = test_input($value);
      // session_start();
      // $_SESSION['user'] = $fromuser;
      header("Location: userpage.php?user=".$fromuser);
   }
  }
  
  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["userdelete"] ) ){
      
      if(!empty($_POST['checkUser'])) {
          foreach($_POST['checkUser'] as $value){
              $username = test_input($value);
                  $sql ="DELETE FROM User WHERE username='".$username."'";
                  if ($conn->query($sql) === TRUE) {
                      echo "<script>alert('شما کاربر $value را حذف کردید');</script>";
                  }
                  else {
                      echo "Error: " . $conn->error;
                      }
          }
  }
  else{
      echo "<script>alert('شما کاربری انتخاب نکردید');</script>";
  }
  }


  if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["ok"] ) ){
    
    if(!empty($_POST['checkUser'])) {
        foreach($_POST['checkUser'] as $value){
            $Aname = test_input($value);
            $sql = "UPDATE Seller SET checkType='ok' WHERE username='".$Aname."'";
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('شما فروشنده $value را تایید کردید');</script>";
                }
                else {
                    echo "Error: " . $conn->error;
                    }
        }
}
else{
    echo "<script>alert('شما فروشنده ای انتخاب نکردید');</script>";
}
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["delete"] ) ){
    
    if(!empty($_POST['checkUser'])) {
        foreach($_POST['checkUser'] as $value){
            $Aname = test_input($value);
              $sql ="DELETE FROM User WHERE username='".$Aname."'";
                if ($conn->query($sql) === TRUE) {
                    echo "<script>alert('شما فروشنده $value را عدم تایید و حذف کردید');</script>";
                }
                else {
                   echo "Error: " . $conn->error;
                    }
        }
}
else{
    echo "<script>alert('شما فروشنده ای انتخاب نکردید');</script>";
}
}

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["mdelete"] ) ){
    
  if(!empty($_POST['checkm'])) {
      foreach($_POST['checkm'] as $value){
          $mmname = test_input($value);
              $sql ="DELETE FROM Book WHERE bookName='".$mmname."'";
              if ($conn->query($sql) === TRUE) {
                  echo "<script>alert('شما کتاب $value را حذف کردید');</script>";
              }
              else {
                  echo "Error: " . $conn->error;
                  }
      }
}
else{
  echo "<script>alert('شما کتابی انتخاب نکردید');</script>";
}
} 

if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST["mok"] ) ){
    
  if(!empty($_POST['checkm'])) {
      foreach($_POST['checkm'] as $value){
          $mmname = test_input($value);
          $sql = "UPDATE Book SET report='Fine' WHERE bookName='".$mmname."'";
          if ($conn->query($sql) === TRUE) {
                  echo "<script>alert('شما کتاب $value را تایید کردید');</script>";
              }
              else {
                  echo "Error: " . $conn->error;
                  }
      }
}
else{
  echo "<script>alert('شما کتابی انتخاب نکردید');</script>";
}
} 

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['submit'])) {
 }
?>
<?php
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['signup'])){
  header("Location: signup.php");
}
?>
<body>

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
            src="pics/lock.png"
            alt="">
          </div>
          <div class="col" style="color:white; text-align: right;" >
            <h5 class="mt-3">admin
          </h5>
          <small style="white-space: pre;">صفحه ادمین</small>
          </div>
        </div>
        <ul class=" nav nav-tabs navbar-nav bd-navbar-nav py-5 mr-auto" dir="rtl" id="myTab" role="tablist">
          <li class="nav-item" style="text-align: right;"><a class="nav-link active" id="allusers-tab" data-toggle="tab" href="#allusers" aria-controls="allusers" aria-selected="true">لیست کاربران</a></li>
          <li class="nav-item" style="text-align: right;"><a class="nav-link" id="allsellers-tab" data-toggle="tab" href="#allsellers" aria-controls="allsellers" aria-selected="false">لیست فروشندگان</a></li>
          <li class="nav-item" style="text-align: right;"><a class="nav-link" id="allbooks-tab" data-toggle="tab" href="#allbooks" aria-controls="allbooks" aria-selected="false">کتاب های ثبت شده</a></li>
          <li class="nav-item" style="text-align: right;"><a class="nav-link" id="reportedbooks-tab" data-toggle="tab" href="#reportedbooks" aria-controls="reportedbooks" aria-selected="false">کتاب های گزارش شده</a></li>
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
                <div class="tab-pane fade show active" id="allusers" role="tabpanel" aria-labelledby="allusers-tab">
                  <form dir="rtl" class="text-right form1" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                    <div class="row">
                      <div class="form-group">
                        <?php
                          $names = "SELECT username FROM User WHERE username!='admin'";
                          $result = $conn->query($names);
                          $i = 0;
                          if ($result->num_rows > 0) {
                              while($row = $result->fetch_assoc()) {
                                  $i++;
                                  // echo '<a href="users.php">'.$row["username"].'</a>';
                                  echo '<input type="checkbox" class="checkbox" name="checkUser[]" value="'.$row["username"].'">';
                                  echo '<input type="submit" class="usrbtn" name="userbttn[]" value="'.$row["username"].'" ><br>';
                              }
                          }
                          // echo '<br><br><br><br>
                          //     <input type="submit" class="cnclbtn" name="userdelete" value="Delete"/>';
                         ?>
                      </div>
                    </div>
                    <div class="row">
                      <div class="delbtn-box">
                          <input type="submit" class="delbtn" name="userdelete" value="حذف کاربر">
                      </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade show" id="allsellers" role="tabpanel" aria-labelledby="allsellers-tab">
                  <form dir="rtl" class="text-right form1" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                    <div class="row">
                      <div class="col">
                        <div class="form-group">
                          <h2>لیست فروشندگان</h2>
                          <?php
                            $names = "SELECT username FROM User WHERE userType='S'";
                            $result = $conn->query($names);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                    echo '<label class="form-control-label lablelist">'.$row["username"].'</label><br>';
                                }
                            }
                          ?>
                        </div>
                      </div>
                      <div class="col">
                        <div class="form-group">
                          <h2>فروشندگان جدید</h2>
                          <?php
                            $names = "SELECT username FROM Seller WHERE checkType='Checking'";
                            $result = $conn->query($names);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  echo '<input type="checkbox" name="checkUser[]" value="'.$row["username"].'">';
                                  echo '<label for="checkUser[]" class="form-control-label lablelist">'.$row["username"].'</label><br>';
                                }
                            }
                          ?>
                          <div class="listbtn-box">
                              <input type="submit" class="verbtn" name="ok" value="تایید"/>
                              <input type="submit" class="nverbtn" name="delete" value="عدم تایید">
                          </div>
                        </div>
                      </div>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade show" id="allbooks" role="tabpanel" aria-labelledby="allbooks-tab">
                  <form dir="rtl" class="text-right form2" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                  <div class="table-responsive" style="height: 560px!important; overflow: auto;">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">نام کتاب</th>
                          <th scope="col">نام فروشنده</th>
                          <th scope="col">نام فروشگاه</th>
                          <th scope="col">نویسنده</th>
                          <th scope="col">موضوع</th>
                          <th scope="col">قیمت</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                            $names = "SELECT * FROM Book";
                            $result = $conn->query($names);
                            $i = 0;
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  $i++;
                                  echo'
                                  <tr>
                                    <th scope="row">'.$i.'</th>
                                    <td>'.$row["bookName"].'</td>
                                    <td>'.$row["sellerUsername"].'</td>
                                    <td>'.$row["storeName"].'</td>
                                    <td>'.$row["author"].'</td>
                                    <td>'.$row["cat"].'</td>
                                    <td>'.$row["cost"].'</td>
                                  </tr>';
                                }
                            }
                          ?>
                      </tbody>
                    </table>
                    </div>
                  </form>
                </div>
                <div class="tab-pane fade show" id="reportedbooks" role="tabpanel" aria-labelledby="reportedbooks-tab">
                  <form dir="rtl" class="text-right form2" method="POST" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
                  <br><br><br><br>
                    <div class="row">
                      <div class="form-group">
                        <?php
                          $mnames = "SELECT * FROM Book WHERE report='report'";
                          $mresult = $conn->query($mnames);
                          if ($mresult->num_rows > 0) {
                              while($mrow = $mresult->fetch_assoc()) {
                                  echo '<input type="checkbox" class="checkbox" name="checkm[]" value="'.$mrow["bookName"].'">';
                                  // echo '<input type="submit" class="usrbtn" name="msongbttn[]" value="'.$mrow["bookName"].'" ><br>';
                                  echo '<label for="checkm[]" class="form-control-label lablelist">'.$mrow["bookName"].'</label><br>';
                              }
                          }
                         ?>
                      </div>
                    </div>
                    <!-- <div class="row"> -->
                    <div class="listbtn-box">
                              <input type="submit" style="background-color:#1E1B42;color:white;border:none;" class="verbtn" name="mdelete" value="حذف کتاب">
                              <input type="submit" style="background-color:white;color:#1E1B42;border:2px solid #1E1B42;" class="nverbtn" name="mok" value="تایید کتاب">
                          </div>
                      <!-- <div class="delbtn-box">
                          <input type="submit" class="delbtn" name="mdelete" value="حذف کتاب">
                          <input type="submit" class="delbtn verbtn" name="mok" value="تایید کتاب">
                      </div> -->
                    <!-- </div> -->
                  </form>
                </div>
              </div>
            </div>
          </div>
          <div style="text-align: center; color:white;"><a href="mainpage.php" data-toggle="tooltip" title="BookClub.com">بازگشت به صفحه اصلی</a></div>
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