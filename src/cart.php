<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
  <title>BookClubCart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link rel="stylesheet" type="text/css" href="css/cartcss.css">

</head>
<?php session_start(); ?>

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

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['delete'])) {
  foreach($_POST['delete'] as $value){
    $user=test_input($_SESSION['username']);
    $bcode = test_input($value);
      $nn="SELECT EXISTS(SELECT buyerUsername FROM Cart WHERE bookCode='".$bcode."' AND buyerUsername='".$user."')";
      $re = $conn->query($nn);
      $r = $re->fetch_array();
      if($r[0]!=0){
        $names="SELECT * FROM Cart WHERE bookCode='".$bcode."' AND buyerUsername='".$user."' ";
        $result = $conn->query($names);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              if($row["numOrder"]>=2){
                $count=$row["numOrder"]-1;
                $sql2="UPDATE Cart SET numOrder = '".$count."' WHERE bookCode='".$bcode."' AND buyerUsername='".$user."'";
                if ($conn->query($sql2) === TRUE) {
              }
              else {
                  echo "Error: " . $conn->error;
                  }
              }
              else if($row["numOrder"]==1){
                $sql="DELETE FROM Cart WHERE bookCode='".$bcode."' AND buyerUsername='".$user."' ";
                if ($conn->query($sql) === TRUE) {
              }
              else {
                  echo "Error: " . $conn->error;
                  }
              }
            }
          }
          }
          else{
              echo "<script>alert('شما قبلا این کتاب را به لیست علاقه مندی اضافه کردید');</script>";
          }
        }
}

if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['dec'])) {
  foreach($_POST['dec'] as $value){
    $user=test_input($_SESSION['username']);
    $bcode = test_input($value);
        $names="SELECT * FROM Cart WHERE bookCode='".$bcode."' AND buyerUsername='".$user."' ";
        $result = $conn->query($names);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              if($row["numOrder"]>1){
                $count=$row["numOrder"]-1;
                $sql2="UPDATE Cart SET numOrder = '".$count."' WHERE bookCode='".$bcode."' AND buyerUsername='".$user."'";
                if ($conn->query($sql2) === TRUE) {
              }
              else {
                  echo "Error: " . $conn->error;
                  }
              }
              else if($row["numOrder"]==1){
                $sql="DELETE FROM Cart WHERE bookCode='".$bcode."' AND buyerUsername='".$user."' ";
                if ($conn->query($sql) === TRUE) {
              }
              else {
                  echo "Error: " . $conn->error;
                  }
              }
            }
          }
        }
}
if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['inc'])) {
  foreach($_POST['inc'] as $value){
    $user=test_input($_SESSION['username']);
    $bcode = test_input($value);
        $names="SELECT * FROM Book WHERE bookCode='".$bcode."' ";
        $result = $conn->query($names);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
              $nn="SELECT * FROM Cart WHERE bookCode='".$bcode."' AND buyerUsername='".$user."' ";
        $res = $conn->query($nn);
        if ($res->num_rows > 0) {
            while($rrow = $res->fetch_assoc()) {
              if($rrow["numOrder"]!=$row["stock"]){
                $count=$rrow["numOrder"]+1;
                $sql2="UPDATE Cart SET numOrder = '".$count."' WHERE bookCode='".$bcode."' AND buyerUsername='".$user."'";
                if ($conn->query($sql2) === TRUE) {
              }
              else {
                  echo "Error: " . $conn->error;
                  }
              }
              else if($rrow["numOrder"]==$row["stock"]){
                echo "<script>alert('شما حداکثر تعداد موجودی این کتاب را انتخاب کردید');</script>";
              }
            }
          }
            }
          }
        }
}

// if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['sold'])) {
//     $user=test_input($_SESSION['username']);
//         $names="SELECT * FROM Cart WHERE buyerUsername='".$user."' ";
//         $result = $conn->query($names);
//         if ($result->num_rows > 0) {
//             while($row = $result->fetch_assoc()) {
//               $nn="SELECT * FROM Cart WHERE sellerUsername='".$row["sellerUsername"]."' AND buyerUsername='".$user."' ";
//               $total=0;
//         $res = $conn->query($nn);
//         if ($res->num_rows > 0) {
//             while($rrow = $res->fetch_assoc()) {
//               $total=($rrow["cost"]*$rrow["numOrder"])+$total;
//               $selle=$row["sellerUsername"];
//               $sql2 = "INSERT INTO `Sold` (`sellerUsername`, `cost`) VALUES ('$selle' ,'$total')";
//             if ($conn->query($sql2) === TRUE) {
//               $date=date("Y/m/d");
//               $bookName=$row["bookName"];
//               $code=$row["bookCode"];
//               $date1=$row["oDate"];
//               $numo=$row["numOrder"];
//             $img=$row["img"];
//             $seller=$row["sellerUsername"];
//             $cost=$row["cost"];
//               $sql = "INSERT INTO `Soldcart` (`buyerUsername`, `bookCode`, `numOrder`,`oDate`, `bDate`,`bookName`,`img`,`sellerUsername`,`cost`) VALUES ('$user' ,'$code','$numo','$date1','$date','$bookName','$img','$seller','$cost')";
//                 if ($conn->query($sql) === TRUE) {
//                   $sql2="DELETE FROM Cart WHERE buyerUsername='".$user."' AND bookCode='".$code."' ";
//                   if ($conn->query($sql2) === TRUE) {}
//                   else {
//                     echo "Error: " . $conn->error;
//                     }
//             }
//             else {
//                 echo "Error: " . $conn->error;
//                 }
//             }
//             else {
//                 echo "Error: " . $conn->error;
//                 }
//             }
//           }
//             }
//           }
// }


if ($_SERVER["REQUEST_METHOD"] == "POST" and isset($_POST['addaddr'])) {
  if (empty($_POST["ostan"]) || empty($_POST["city"]) || empty($_POST["name"])|| empty($_POST["thadd"])) {
    if(empty($_POST['checkUser'])) echo "<script>alert('لطفا تمام قسمت ها را وارد نمایید');</script>";
    else {
      $user=test_input($_SESSION['username']);
          $names="SELECT * FROM Cart WHERE buyerUsername='".$user."' ";
          $result = $conn->query($names);
          if ($result->num_rows > 0) {
              while($row = $result->fetch_assoc()) {
                 /////////////////
                 $numo=$row["numOrder"];
                 $code=$row["bookCode"];
                 $sbook="SELECT * FROM Book WHERE bookCode='".$code."' ";
                 $resultsb = $conn->query($sbook);
                 if ($resultsb->num_rows > 0) {
                     while($rre = $resultsb->fetch_assoc()) {
                       if($rre["stock"]>=$numo){
                         $count=$rre["stock"]-$numo;
                         $sql2="UPDATE Book SET stock = '".$count."' WHERE bookCode='".$code."' ";
                         if ($conn->query($sql2) === TRUE){
                  
                          ////////////
                $nn="SELECT * FROM Cart WHERE sellerUsername='".$row["sellerUsername"]."' AND buyerUsername='".$user."' ";
                $total=0;
          $res = $conn->query($nn);
          if ($res->num_rows > 0) {
              while($rrow = $res->fetch_assoc()) {
                $total=($rrow["cost"]*$rrow["numOrder"])+$total;
                $selle=$row["sellerUsername"];
                $sql2 = "INSERT INTO `Sold` (`sellerUsername`, `cost`) VALUES ('$selle' ,'$total')";
              if ($conn->query($sql2) === TRUE) {
                $date=date("Y/m/d");
                $bookName=$row["bookName"];
                $code=$row["bookCode"];
                $date1=$row["oDate"];
                $numo=$row["numOrder"];
              $img=$row["img"];
              $seller=$row["sellerUsername"];
              $cost=$row["cost"];
                $sql = "INSERT INTO `Soldcart` (`buyerUsername`, `bookCode`, `numOrder`,`oDate`, `bDate`,`bookName`,`img`,`sellerUsername`,`cost`) VALUES ('$user' ,'$code','$numo','$date1','$date','$bookName','$img','$seller','$cost')";
                  if ($conn->query($sql) === TRUE) {
                    $sql2="DELETE FROM Cart WHERE buyerUsername='".$user."' AND bookCode='".$code."' ";
                    if ($conn->query($sql2) === TRUE) {
                     
                    }
                    else {
                      echo "Error: " . $conn->error;
                      }
              }
              else {
                  echo "Error: " . $conn->error;
                  }
              }
              else {
                  echo "Error: " . $conn->error;
                  }
              }
            }
            if($count==0){
              $sq2="DELETE FROM Cart WHERE bookCode='".$code."' ";
              if ($conn->query($sq2) === TRUE){}
              else {
                echo "Error: " . $conn->error;
                }
             }
          }
          else {
            echo "Error: " . $conn->error;
            }
          }
        else {
          $sql2="UPDATE Cart SET numOrder = '".$rre["stock"]."' WHERE buyerUsername='".$user."' AND bookCode='".$code."' ";
          if ($conn->query($sql2) === TRUE){
            $bnam=$row["bookName"];
          echo"<script>alert('کتاب $bnam بیش از حد موجود انتخاب شده است');</script>";
          }
          else {
            echo "Error: " . $conn->error;
            }
        }
        }
      }
            /////////
              }
            }
        
    }
}
else {
  $user=test_input($_SESSION['username']);
    $ostan = test_input($_POST["ostan"]);
    $city = test_input($_POST["city"]);
    $name = test_input($_POST["name"]);
    $thadd = test_input($_POST["thadd"]);

    $sql = "INSERT INTO Addresses (buyerUsername,ostan,city,buyername,addres) VALUES ('$user','$ostan','$city','$name','$thadd')";
     if ($conn->query($sql) === TRUE) {} else {
      echo "Error: " . $conn->error;
      }
      $names="SELECT * FROM Cart WHERE buyerUsername='".$user."' ";
      $result = $conn->query($names);
      if ($result->num_rows > 0) {
          while($row = $result->fetch_assoc()) {
             /////////////////
             $numo=$row["numOrder"];
             $code=$row["bookCode"];
             $sbook="SELECT * FROM Book WHERE bookCode='".$code."' ";
             $resultsb = $conn->query($sbook);
             if ($resultsb->num_rows > 0) {
                 while($rre = $resultsb->fetch_assoc()) {
                   if($rre["stock"]>=$numo){
                     $count=$rre["stock"]-$numo;
                     $sql2="UPDATE Book SET stock = '".$count."' WHERE bookCode='".$code."' ";
                     if ($conn->query($sql2) === TRUE){
                      
                      ////////////
            $nn="SELECT * FROM Cart WHERE sellerUsername='".$row["sellerUsername"]."' AND buyerUsername='".$user."' ";
            $total=0;
      $res = $conn->query($nn);
      if ($res->num_rows > 0) {
          while($rrow = $res->fetch_assoc()) {
            $total=($rrow["cost"]*$rrow["numOrder"])+$total;
            $selle=$row["sellerUsername"];
            $sql2 = "INSERT INTO `Sold` (`sellerUsername`, `cost`) VALUES ('$selle' ,'$total')";
          if ($conn->query($sql2) === TRUE) {
            $date=date("Y/m/d");
            $bookName=$row["bookName"];
            $code=$row["bookCode"];
            $date1=$row["oDate"];
            $numo=$row["numOrder"];
          $img=$row["img"];
          $seller=$row["sellerUsername"];
          $cost=$row["cost"];
            $sql = "INSERT INTO `Soldcart` (`buyerUsername`, `bookCode`, `numOrder`,`oDate`, `bDate`,`bookName`,`img`,`sellerUsername`,`cost`) VALUES ('$user' ,'$code','$numo','$date1','$date','$bookName','$img','$seller','$cost')";
              if ($conn->query($sql) === TRUE) {
                $sql2="DELETE FROM Cart WHERE buyerUsername='".$user."' AND bookCode='".$code."' ";
                if ($conn->query($sql2) === TRUE) {
                 
                }
                else {
                  echo "Error: " . $conn->error;
                  }
          }
          else {
              echo "Error: " . $conn->error;
              }
          }
          else {
              echo "Error: " . $conn->error;
              }
          }
        }
        if($count==0){
          $sq2="DELETE FROM Cart WHERE bookCode='".$code."' ";
          if ($conn->query($sq2) === TRUE){}
          else {
            echo "Error: " . $conn->error;
            }
         }
      }
      else {
        echo "Error: " . $conn->error;
        }
      }
    else {
      $sql2="UPDATE Cart SET numOrder = '".$rre["stock"]."' WHERE buyerUsername='".$user."' AND bookCode='".$code."' ";
      if ($conn->query($sql2) === TRUE){
        $bnam=$row["bookName"];
      echo"<script>alert('کتاب $bnam بیش از حد موجود انتخاب شده است');</script>";
      }
      else {
        echo "Error: " . $conn->error;
        }
    }
    }
  }
        /////////
          }
        }
    
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


<br><br><br>
<div dir="rtl" class="container" style="background-color:white;">
<form method="post" action=<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>>
<?php
if(isset($_SESSION['username']) && !empty($_SESSION['username']) && $_SESSION['username']!='admin99'){
  $user=test_input($_SESSION['username']);
  $ff="SELECT EXISTS(SELECT * FROM User WHERE userType='S' AND username='".$user."')";
    $fre = $conn->query($ff);
    $fr = $fre->fetch_array();
    if($fr[0]==0){
echo'
<section class="signup-step-container">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="wizard">
                        <div class="wizard-inner">
                            <div class="connecting-line"></div>
                            <ul class="nav nav-tabs" role="tablist">
                                <li role="presentation" class="active">
                                    <a href="#step1" data-toggle="tab" aria-controls="step1" role="tab" aria-expanded="true"><span class="round-tab"><span class="bi bi-cart4"></span></span></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step2" data-toggle="tab" aria-controls="step2" role="tab" aria-expanded="false"><span class="round-tab"><span class="bi bi-geo-alt"></span></span></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step3" data-toggle="tab" aria-controls="step3" role="tab"><span class="round-tab"><span class="bi bi-receipt-cutoff"></span></span></a>
                                </li>
                                <li role="presentation" class="disabled">
                                    <a href="#step4" data-toggle="tab" aria-controls="step4" role="tab"><span class="round-tab"><span class="bi bi-patch-check"></span></span></a>
                                </li>
                            </ul>
                        </div>
        
                        <form role="form" action="index.html" class="login-box">
                            <div class="tab-content" id="main_form">
                                <div class="tab-pane active" role="tabpanel" id="step1">
                                    <div class="row">
                                    <table class="table" style="width:100%; text-align: right; margin-top:35px;">
                                    <thead >
    <tr style="border-top: hidden;">
      <th scope="col">کتاب های شما</th>
      <th scope="col">تعداد</th>
      <th scope="col">قیمت</th>
      <th scope="col">حذف</th>
    </tr>
  </thead>
  <tbody>';
                          $names = "SELECT * FROM Cart WHERE buyerUsername='".$user."' ";
                          $result = $conn->query($names);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  echo'
                                  <tr>
      <th scope="row" width="35%" >
      <div style="display:flex!important; float:right;"><img  style="margin-left:15px!important;" class="bookimage" src="'.$row["img"].'" alt="Book image" style="width:100%"><a href=bookpage.php?bookcode='.$row["bookCode"].' class="imgtxt">'.$row["bookName"].'</a></div>
      </th>
      <td width="20%" ><div style="margin-top:61.75px;"><button type="submit" class="btn-link" name="inc[]" value="'.$row["bookCode"].'"><i class="bi bi-plus-circle"></i></button>'.$row["numOrder"].'<button type="submit" class="btn-link" name="dec[]" value="'.$row["bookCode"].'"><i class="bi bi-dash-circle"></i></button></div></td>
      <td width="20%"><div style="margin-top:61.75px;">'.$row["cost"].'</div></td>
      <td width="20%"><div style="margin-top:59px;"><button type="submit" class="btn-link cancel" name="delete[]" value="'.$row["bookCode"].'"><i class="bi bi-x-circle-fill"></i></button></div></td>
    </tr>';
                                  
                                }
                            }
  

echo'</tbody>
</table>
</div>
                                    <ul class="list-inline pull-right">
                                        <li><button type="button" class="default-btn next-step">ادامه ثبت سفارش</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step3">';
                                $nn="SELECT EXISTS(SELECT buyerUsername FROM Addresses WHERE buyerUsername='".$user."')";
                                    $re = $conn->query($nn);
                                    $r = $re->fetch_array();
                                    if($r[0]!=0){
                                      echo'<h4 style="text-align:right;color: #1e549c;font-size: 20px; font-weight:bold;">آدرس های ثبت شده</h4><br>';
                            $names = "SELECT * FROM Addresses WHERE buyerUsername='".$user."'";
                            $result = $conn->query($names);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  echo'<div style="text-align:right;">';
                                  echo '<input type="radio" name="checkUser[]" value="'.$row["num"].'">';
                                  echo '<label for="checkUser[]" class="form-control-label lablelist">گیرنده: '.$row["buyername"].'/</label>
                                  <label for="checkUser[]" class="form-control-label lablelist">استان: '.$row["ostan"].'/</label>
                                  <label for="checkUser[]" class="form-control-label lablelist">شهر: '.$row["city"].'/</label>
                                  <label for="checkUser[]" class="form-control-label lablelist">آدرس: '.$row["addres"].'</label>
                                  <br>';
                                }
                            }
                            echo'</div><br><br><h4 style="text-align:right;color: #1e549c;font-size: 20px; font-weight:bold;">آدرس جدید</h4>';
                                    }
                                    echo'<div class="row" style="text-align:right;margin-top:40px;">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">استان</label> 
                                            <select  class="form-control frm2" name="ostan">
                                            <option selected="selected">انتخاب استان</option>
                                                <option style="font-weight:normal; font-size:12px;" value="آذربایجان">آذربایجان</option>
                                                <option style="font-weight:normal; font-size:12px;" value="تهران">تهران</option>
                                                <option style="font-weight:normal; font-size:12px;" value="خراسان">خراسان</option>
                                                <option style="font-weight:normal; font-size:12px;" value="فارس">فارس</option>
                                                <option style="font-weight:normal; font-size:12px;" value="قم">قم</option>
                                                <option style="font-weight:normal; font-size:12px;" value="لرستان">لرستان</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-control-label">شهر</label> 
                                            <input class="form-control frm2" type="text" name="city" placeholder=""> 
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                          <label>نام گیرنده</label> 
                                          <input class="form-control frm2" type="text" name="name" placeholder="">
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>آدرس</label> 
                                            <input class="form-control frm2" type="text" name="thadd" placeholder=""> 
                                        </div>
                                    </div>
                                   </div>
                                    
                                    
                                    <ul class="list-inline pull-right">
                                        <li><button type="submit" class="default-btn next-step" name="addaddr">ثبت سفارش</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step2">
                                     <div class="row">
                                     <table class="table" style="width:100%; text-align: right; margin-top:35px;">
                                     <thead >
     <tr style="border-top: hidden;">
       <th scope="col">کتاب های شما</th>
       <th scope="col">تعداد</th>
       <th scope="col">قیمت</th>
     </tr>
   </thead>
   <tbody>';
                           $names = "SELECT * FROM Cart WHERE buyerUsername='".$user."' ";
                           $result = $conn->query($names);
                             if ($result->num_rows > 0) {
                                 while($row = $result->fetch_assoc()) {
                                   echo'
                                   <tr>
       <th scope="row" width="35%" >
       <div style="display:flex!important; float:right;"><img  style="margin-left:15px!important;" class="bookimage" src="'.$row["img"].'" alt="Book image" style="width:100%"><span class="imgtxt">'.$row["bookName"].'</span></div>
       </th>
       <td width="20%" ><div style="margin-top:61.75px;">'.$row["numOrder"].'</div></td>
       <td width="20%"><div style="margin-top:61.75px;">'.$row["cost"].'</div></td>
     </tr>';
                                   
                                 }
                             }
   
 
 echo'</tbody>
 </table>
                                       </div>
                                    <ul class="list-inline pull-right">';
                                    $names = "SELECT * FROM Cart WHERE buyerUsername='".$user."' ";
                                    $total=0;
                           $result = $conn->query($names);
                             if ($result->num_rows > 0) {
                                 while($row = $result->fetch_assoc()) {
                                  $total=($row["cost"]*$row["numOrder"])+$total;
                                 }
                                }
                                        echo'
                                        <li><div style="margin-bottom:30px;"> جمع کل: '.$total.'</div></li>
                                        <li><button type="button" class="default-btn next-step" name="sold">ثبت سفارش</button></li>
                                    </ul>
                                </div>
                                <div class="tab-pane" role="tabpanel" id="step4">
                                    <h4 class="text-center" style="margin-bottom:50px;margin-top:50px;">خرید شما ثبت شد</h4>
                                   
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
 ';
                              }
                              else{
                                echo "<script>alert('لطفا با حساب کاربری خریدار وارد شوید');
    window.location.href='mainpage.php';</script>";
                              }
}
else echo "<script>alert('لطفا ابتدا وارد حساب کاربری خود شوید');
window.location.href='mainpage.php';</script>";?>
  </form>
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


// ------------step-wizard-------------
$(document).ready(function () {
    $('.nav-tabs > li a[title]').tooltip();
    
    //Wizard
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {

        var target = $(e.target);
    
        if (target.parent().hasClass('disabled')) {
            return false;
        }
    });

    $(".next-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        active.next().removeClass('disabled');
        nextTab(active);

    });
    $(".prev-step").click(function (e) {

        var active = $('.wizard .nav-tabs li.active');
        prevTab(active);

    });
});

function nextTab(elem) {
    $(elem).next().find('a[data-toggle="tab"]').click();
}
function prevTab(elem) {
    $(elem).prev().find('a[data-toggle="tab"]').click();
}


$('.nav-tabs').on('click', 'li', function() {
    $('.nav-tabs li.active').removeClass('active');
    $(this).addClass('active');
});
</script>
</body>
</html>
