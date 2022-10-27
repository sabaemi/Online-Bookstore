<!DOCTYPE html>
<html lang="fa">
<head>
  <title>BookClub</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="css/mainpagecss.css">

</head>

<body>

<?php
$err = "";
$servername = "localhost";
$username = "username";
$password = "password";
$dataBase = "bookclub";
$err = "";
// session_start();
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

<br>
  <div dir="rtl" class="container">
    <div class="carousel slide" id="main-carousel" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#main-carousel" data-slide-to="0" class="active"></li>
        <li data-target="#main-carousel" data-slide-to="1"></li>
      </ol>
      
      <div id="firstinner" class="carousel-inner">

        <div class="carousel-item active">
          <img class="d-block img-fluid" src="pics/s12.jpg" alt="">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>

        <div class="carousel-item">
          <img class="d-block img-fluid" src="pics/s22.jpg" alt="">
          <div class="carousel-caption d-none d-md-block">
          </div>
        </div>

      </div>


    </div>
  </div>


  <br> <br> <br>
<p dir="rtl" class="container text-right" style="color:#1d4c8a; font-weight:bold; font-size:15px; ">محبوب ترین ها</p>
  <div dir="rtl" class="container text-center" >
  <div id="myCarousel" class="carousel slide" data-interval="false">

    <div class="container carousel-inner" role="listbox">

      <!-- <div class="container carousel-item active"> 

<ul class="list-group list-group-horizontal">
<a href="#" class="list-group-item flex-fill">
  <div class="card">
              <img class="" src="https://cdn.fidibo.com/images/books/96207_10859_normal.jpg" alt="" style="width:100%">
              <div class="card-body">
                <p class="">کتاب اثر مرکب</p>
                <p class="">دارن هاردی</p>
              </div>
            </div>
</a>
<a href="#"  class="list-group-item flex-fill">
    <div class="card">
              <img class="card-img-top" src="https://cdn.fidibo.com/images/books/96207_10859_normal.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <p class="card-title">کتاب اثر مرکب</p>
                <p class="card-text">دارن هاردی</p>
              </div>
            </div>
</a>
  <a href="#" class="list-group-item flex-fill">
      <div class="card">
              <img class="card-img-top" src="https://cdn.fidibo.com/images/books/96207_10859_normal.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <p class="card-title">کتاب اثر مرکب</p>
                <p class="card-text">دارن هاردی</p>
              </div>
            </div>
</a>
<a href="#" class="list-group-item flex-fill">
      <div class="card">
              <img class="card-img-top" src="https://cdn.fidibo.com/images/books/96207_10859_normal.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <p class="card-title">کتاب اثر مرکب</p>
                <p class="card-text">دارن هاردی</p>
              </div>
            </div>
</a>
</ul>
</div> -->

<div class="container carousel-item active"> 

<ul class="list-group list-group-horizontal">

<?php
$fav="SELECT DISTINCT bookCode FROM Likedbooks";
$favresult = $conn->query($fav);
$i = 0;
if ($favresult->num_rows > 0) {
  while($frow = $favresult->fetch_assoc() and $i<4) {
                            $names = "SELECT * FROM Book WHERE bookCode='".$frow["bookCode"]."'";
                            $result = $conn->query($names);
                            // $i = 0;
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  $i++;
                                  // $code = $row["bookCode"];
                                  // $_SESSION['bookcode'] = $code;
                                  echo'
                                  <a href=bookpage.php?bookcode='.$row["bookCode"].' class="list-group-item flex-fill">
                                    <div class="card">
                                      <img class="card-img-top" src="'.$row["img"].'" alt="Card image" style="width:100%">
                                      <div class="card-body">
                                        <p class="card-title">'.$row["bookName"].'</p>
                                        <p class="card-text">'.$row["author"].'</p>
                                      </div>
                                    </div>
                                  </a>';
                                }
                            }
                          }
                        }
?>
<!-- 
<a href="#" class="list-group-item flex-fill">
  <div class="card">
                <img class="card-img-top" src="https://cdn.fidibo.com/images/books/118266_92542_normal.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <p class="card-title">جای خالی سلوچ</p>
                <p class="card-text">محمود دولت آبادی</p>
              </div>
            </div>
</a>
<a href="#"  class="list-group-item flex-fill">
    <div class="card">
              <img class="card-img-top" src="https://cdn.fidibo.com/images/books/96207_10859_normal.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <p class="card-title">کتاب اثر مرکب</p>
                <p class="card-text">دارن هاردی</p>
              </div>
            </div>
</a>
  <a href="#" class="list-group-item flex-fill">
      <div class="card">
              <img class="card-img-top" src="https://cdn.fidibo.com/images/books/96207_10859_normal.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <p class="card-title">کتاب اثر مرکب</p>
                <p class="card-text">دارن هاردی</p>
              </div>
            </div>
</a>
<a href="#" class="list-group-item flex-fill">
      <div class="card">
              <img class="card-img-top" src="https://cdn.fidibo.com/images/books/96207_10859_normal.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <p class="card-title">کتاب اثر مرکب</p>
                <p class="card-text">دارن هاردی</p>
              </div>
            </div>
</a> -->
</ul>
</div>

<div class="container carousel-item"> 

<ul class="list-group list-group-horizontal">
<?php
if ($favresult->num_rows > 0) {
  while($frow = $favresult->fetch_assoc() and $i<8) {
                            $names = "SELECT * FROM Book WHERE bookCode='".$frow["bookCode"]."'";
                            $result = $conn->query($names);
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc()) {
                                  $i++;
                                  $code = test_input($row["bookCode"]);
                                  // $_SESSION['bookcode'] = $code;
                                  echo'
                                  <a href=bookpage.php?bookcode='.$code.' class="list-group-item flex-fill">
                                    <div class="card">
                                      <img class="card-img-top" src="'.$row["img"].'" alt="Card image" style="width:100%">
                                      <div class="card-body">
                                        <p class="card-title">'.$row["bookName"].'</p>
                                        <p class="card-text">'.$row["author"].'</p>
                                      </div>
                                    </div>
                                  </a>';
                                }
                            }
                          }
                        }
?>
<!-- <a href="#" class="list-group-item flex-fill">
  <div class="card">
  <img class="card-img-top" src="https://cdn.fidibo.com/images/books/67217_91322_normal.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <p class="card-title">چهار میثاق</p>
                <p class="card-text">دون مگوئل روئیز</p>
              </div>
            </div>
</a>
<a href="#"  class="list-group-item flex-fill">
    <div class="card">
              <img class="card-img-top" src="https://cdn.fidibo.com/images/books/96207_10859_normal.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <p class="card-title">کتاب اثر مرکب</p>
                <p class="card-text">دارن هاردی</p>
              </div>
            </div>
</a>
  <a href="#" class="list-group-item flex-fill">
      <div class="card">
              <img class="card-img-top" src="https://cdn.fidibo.com/images/books/96207_10859_normal.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <p class="card-title">کتاب اثر مرکب</p>
                <p class="card-text">دارن هاردی</p>
              </div>
            </div>
</a>
<a href="#" class="list-group-item flex-fill">
      <div class="card">
              <img class="card-img-top" src="https://cdn.fidibo.com/images/books/96207_10859_normal.jpg" alt="Card image" style="width:100%">
              <div class="card-body">
                <p class="card-title">کتاب اثر مرکب</p>
                <p class="card-text">دارن هاردی</p>
              </div>
            </div>
</a> -->
</ul>
</div>

</div>
<a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>


<br>
<p dir="rtl" class="container text-right" style="color:#1d4c8a; font-weight:bold; font-size:15px; ">کتاب های رمان</p>
  <div dir="rtl" class="container text-center" >
  <div id="myCarousel3" class="carousel slide" data-interval="false">

    <div class="container carousel-inner" role="listbox">

<div class="container carousel-item active"> 

<ul class="list-group list-group-horizontal">

<?php
                            $names = "SELECT * FROM Book WHERE cat='رمان'";
                            $result = $conn->query($names);
                            $i = 0;
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc() and $i<4) {
                                  $i++;
                                  $code = test_input($row["bookCode"]);
                                  // $_SESSION['bookcode'] = $code;
                                  echo'
                                  <a href=bookpage.php?bookcode='.$code.' class="list-group-item flex-fill">
                                    <div class="card">
                                      <img class="card-img-top" src="'.$row["img"].'" alt="Card image" style="width:100%">
                                      <div class="card-body">
                                        <p class="card-title">'.$row["bookName"].'</p>
                                        <p class="card-text">'.$row["author"].'</p>
                                      </div>
                                    </div>
                                  </a>';
                                }
                            }
?>
</ul>
</div>

<div class="container carousel-item"> 

<ul class="list-group list-group-horizontal">
<?php
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc() and $i<8) {
                                  $i++;
                                  $code = test_input($row["bookCode"]);
                                  // $_SESSION['bookcode'] = $code;
                                  echo'
                                  <a href=bookpage.php?bookcode='.$code.' class="list-group-item flex-fill">
                                    <div class="card">
                                      <img class="card-img-top" src="'.$row["img"].'" alt="Card image" style="width:100%">
                                      <div class="card-body">
                                        <p class="card-title">'.$row["bookName"].'</p>
                                        <p class="card-text">'.$row["author"].'</p>
                                      </div>
                                    </div>
                                  </a>';
                                }
                            }
?>
</ul>
</div>

</div>
<a class="carousel-control-prev" href="#myCarousel3" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel3" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<br>
<p dir="rtl" class="container text-right" style="color:#1d4c8a; font-weight:bold; font-size:15px; ">کتاب های روانشناسی</p>
  <div dir="rtl" class="container text-center" >
  <div id="myCarousel2" class="carousel slide" data-interval="false">

    <div class="container carousel-inner" role="listbox">

<div class="container carousel-item active"> 

<ul class="list-group list-group-horizontal">

<?php
                            $names = "SELECT * FROM Book WHERE cat='روانشناسی'";
                            $result = $conn->query($names);
                            $i = 0;
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc() and $i<4) {
                                  $i++;
                                  $code = test_input($row["bookCode"]);
                                  // $_SESSION['bookcode'] = $code;
                                  echo'
                                  <a href=bookpage.php?bookcode='.$code.' class="list-group-item flex-fill">
                                    <div class="card">
                                      <img class="card-img-top" src="'.$row["img"].'" alt="Card image" style="width:100%">
                                      <div class="card-body">
                                        <p class="card-title">'.$row["bookName"].'</p>
                                        <p class="card-text">'.$row["author"].'</p>
                                      </div>
                                    </div>
                                  </a>';
                                }
                            }
?>
</ul>
</div>

<div class="container carousel-item"> 

<ul class="list-group list-group-horizontal">
<?php
                            if ($result->num_rows > 0) {
                                while($row = $result->fetch_assoc() and $i<8) {
                                  $i++;
                                  $code = test_input($row["bookCode"]);
                                  // $_SESSION['bookcode'] = $code;
                                  echo'
                                  <a href=bookpage.php?bookcode='.$code.' class="list-group-item flex-fill">
                                    <div class="card">
                                      <img class="card-img-top" src="'.$row["img"].'" alt="Card image" style="width:100%">
                                      <div class="card-body">
                                        <p class="card-title">'.$row["bookName"].'</p>
                                        <p class="card-text">'.$row["author"].'</p>
                                      </div>
                                    </div>
                                  </a>';
                                }
                            }
?>
</ul>
</div>

</div>
<a class="carousel-control-prev" href="#myCarousel2" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#myCarousel2" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>

<br>

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











<?php
        $servername = "localhost";
        $username = "username";
        $password = "password";
        $dataBase = "bookclub";

        $conn = new mysqli($servername, $username, $password, $dataBase);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        
        $sql = "CREATE TABLE IF NOT EXISTS User (
             username VARCHAR(30) NOT NULL UNIQUE,
             pass VARCHAR(150) NOT NULL,
            --  hashedpass VARCHAR(150) NOT NULL,
             email varchar(50) NOT NULL UNIQUE,
             userType CHAR(1) NOT NULL,
             PRIMARY KEY(username,userType,email),
             CHECK (userType IN ('B', 'S'))
             
        )";
        if ($conn->query($sql) === TRUE) {
           //echo "u Table created successfully ";
        } else {
          echo "Error creating table: " . $conn->error;
        }

        $sql = "CREATE TABLE IF NOT EXISTS QuestionsList (
          question VARCHAR(30) NOT NULL, 
          username VARCHAR(30) NOT NULL,
          answer VARCHAR(30) NOT NULL,
          FOREIGN KEY ( username )
            REFERENCES User (username)
          ON DELETE CASCADE
          ON UPDATE CASCADE
        )";

        if ($conn->query($sql) === TRUE) {
           //echo "q Table created successfully ";
        } else {
          echo "Error creating table: " . $conn->error;
        }

        $sql = "CREATE TABLE IF NOT EXISTS Buyer (
          firstName VARCHAR(50) NOT NULL,
          lastName VARCHAR(50) NOT NULL,
          YearOfBirth VARCHAR(4) NOT NULL,
          username VARCHAR(30) NOT NULL,
          userType CHAR(1) NOT NULL,
          FOREIGN KEY (username,userType)
            REFERENCES User (username,userType)
          ON DELETE CASCADE
          ON UPDATE CASCADE
             
        )";
        if ($conn->query($sql) === TRUE) {
           //echo "l Table created successfully ";
        } else {
          echo "Error creating table: " . $conn->error;
        }


        $sql = "CREATE TABLE IF NOT EXISTS Seller ( 
          storeName VARCHAR(50) NOT NULL PRIMARY KEY,
          firstName VARCHAR(50) NOT NULL,
          lastName VARCHAR(50) NOT NULL,
          storeCode VARCHAR(50) NOT NULL,
          adress VARCHAR(100) NOT NULL,
          username VARCHAR(30) NOT NULL,
          userType CHAR(1) NOT NULL,
          checkType CHAR(10) NOT NULL,
          FOREIGN KEY (username,userType)
            REFERENCES User (username,userType)
          ON DELETE CASCADE
          ON UPDATE CASCADE

        )";
        if ($conn->query($sql) === TRUE) {
           //echo "a Table created successfully ";
        } else {
          echo "Error creating table: " . $conn->error;
        }

        $sql = "CREATE TABLE IF NOT EXISTS Book (
          bookCode VARCHAR(30) NOT NULL,
          bookName VARCHAR(100) NOT NULL,
          sellerUsername VARCHAR(30) NOT NULL,
          storeName VARCHAR(50) NOT NULL,
          author VARCHAR(100) NOT NULL,
          translator VARCHAR(100) ,
          cat VARCHAR(50) NOT NULL,
          cost VARCHAR(50) NOT NULL,
          publisher VARCHAR(50) NOT NULL,
          publishYear VARCHAR(4) NOT NULL,
          noPages VARCHAR(50) NOT NULL,
          shabak VARCHAR(50) NOT NULL,
          stock VARCHAR(50) NOT NULL,
          about VARCHAR(550) NOT NULL,
          img VARCHAR(100) NOT NULL,
          pubSerial VARCHAR(50) NOT NULL,
          report VARCHAR(70) NOT NULL,
          PRIMARY KEY(bookCode,bookName,img,cost),
          FOREIGN KEY (sellerUsername)
            REFERENCES User (username)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
          FOREIGN KEY (storeName)
            REFERENCES Seller (storeName)
          ON DELETE CASCADE
          ON UPDATE CASCADE

        )";
        if ($conn->query($sql) === TRUE) {
           //echo "m Table created successfully ";
        } else {
          echo "Error creating table: " . $conn->error;
        }
        
        $sql = "CREATE TABLE IF NOT EXISTS Cart (
          buyerUsername VARCHAR(30) NOT NULL,
          bookCode VARCHAR(30) NOT NULL,
          numOrder VARCHAR(50) NOT NULL,
          oDate DATE NOT NULL,
          bookName VARCHAR(100) NOT NULL,
          img VARCHAR(100) NOT NULL,
          sellerUsername VARCHAR(30) NOT NULL,
          cost VARCHAR(50) NOT NULL,
          FOREIGN KEY (sellerUsername)
            REFERENCES User (username)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
          FOREIGN KEY (bookCode,bookName,img,cost)
            REFERENCES Book (bookCode,bookName,img,cost)
          ON DELETE CASCADE
          ON UPDATE CASCADE,
          FOREIGN KEY (buyerUsername)
            REFERENCES Buyer (username)
          ON DELETE CASCADE
          ON UPDATE CASCADE

        )";
        // $sql="ALTER TABLE Cart
        // ADD numOrder varchar(50)";
        if ($conn->query($sql) === TRUE) {
           //echo "m Table created successfully ";
        } else {
          echo "Error creating table: " . $conn->error;
        }


      $sql = "CREATE TABLE IF NOT EXISTS BookReq (
        buyerUsername VARCHAR(30) NOT NULL, 
        bookCode VARCHAR(30) NOT NULL,
        FOREIGN KEY ( buyerUsername )
          REFERENCES Buyer(username)
          ON DELETE CASCADE
        ON UPDATE CASCADE,
        FOREIGN KEY ( bookCode )
          REFERENCES Book (bookCode)
        ON DELETE CASCADE
        ON UPDATE CASCADE
     
      )";

      if ($conn->query($sql) === TRUE) {
         //echo "rc Table created successfully ";
      } else {
        echo "Error creating table: " . $conn->error;
      }

      $sql = "CREATE TABLE IF NOT EXISTS LikedBooks (
        buyerUsername VARCHAR(30) NOT NULL,
        bookCode VARCHAR(30) NOT NULL,
        addDate DATE NOT NULL,
        FOREIGN KEY (buyerUsername)
          REFERENCES Buyer (username)
        ON DELETE CASCADE
        ON UPDATE CASCADE,
         FOREIGN KEY (bookCode)
          REFERENCES Book (bookCode)
         ON DELETE CASCADE
         ON UPDATE CASCADE
        
   )";
   if ($conn->query($sql) === TRUE) {
   } else {
     echo "Error creating table: " . $conn->error;
   }

   $sql = "CREATE TABLE IF NOT EXISTS Sold (
    sellerUsername VARCHAR(30) NOT NULL,
    cost VARCHAR(30) NOT NULL,
    FOREIGN KEY (sellerUsername)
      REFERENCES Seller (username)
    ON DELETE CASCADE
    ON UPDATE CASCADE
    
)";
if ($conn->query($sql) === TRUE) {
} else {
 echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE IF NOT EXISTS Soldcart (
  num int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  buyerUsername VARCHAR(30) NOT NULL,
  bookCode VARCHAR(30) NOT NULL,
  numOrder VARCHAR(50) NOT NULL,
  oDate DATE NOT NULL,
  bDate DATE NOT NULL,
  bookName VARCHAR(100) NOT NULL,
  img VARCHAR(100) NOT NULL,
  sellerUsername VARCHAR(30) NOT NULL,
  cost VARCHAR(50) NOT NULL,
  FOREIGN KEY (sellerUsername)
    REFERENCES User (username)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  FOREIGN KEY (bookCode,bookName,img,cost)
    REFERENCES Book (bookCode,bookName,img,cost)
  ON DELETE CASCADE
  ON UPDATE CASCADE,
  FOREIGN KEY (buyerUsername)
    REFERENCES Buyer (username)
  ON DELETE CASCADE
  ON UPDATE CASCADE

)";
if ($conn->query($sql) === TRUE) {
} else {
 echo "Error creating table: " . $conn->error;
}


$sql = "CREATE TABLE IF NOT EXISTS addresses (
  num int NOT NULL AUTO_INCREMENT PRIMARY KEY,
  buyerUsername VARCHAR(30) NOT NULL,
  ostan VARCHAR(50) NOT NULL,
  city VARCHAR(50) NOT NULL,
  buyername VARCHAR(200) NOT NULL,
  addres VARCHAR(30) NOT NULL,
  FOREIGN KEY (buyerUsername)
    REFERENCES Buyer (username)
  ON DELETE CASCADE
  ON UPDATE CASCADE

)";
if ($conn->query($sql) === TRUE) {
} else {
 echo "Error creating table: " . $conn->error;
}

      ?>





</body>
</html>
