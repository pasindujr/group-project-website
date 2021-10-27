<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ATI Kegalle - Home</title>
<!-- Font Awesome -->
<link
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
        rel="stylesheet"
        />
<!-- Google Fonts -->
<link
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap"
        rel="stylesheet"
        />
<!-- MDB -->
<link
        href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css"
        rel="stylesheet"
        />
</head>

<body>

<!-- Navbar -->
<?php require_once "assets/navbar.php"; ?>
<!-- Navbar --> 

<main class="mt-5">

<!--Main container-->
<div class="container">

<!--Grid row-->
<div class="row"> 
  
  <!--Grid column-->
  <div class="col-md-7 mb-4">
    <div class="view overlay z-depth-1-half"> <img src="https://atikegalle.com/uploads/slide1.jpg" class="card-img-top" alt="">
      <div class="rgba-white-light"></div>
    </div>
  </div>
  <!--Grid column--> 
  
  <!--Grid column-->
  <div class="col-md-5 mb-4">
    <h2>Advanced Technological Institute of Kegalle</h2>
    <hr>
    <p>The Advanced Technological Institute of Kegalle is governed by Sri Lanka Institute of Advanced Technological Education. ATI Kegalle was established on 29th of January 2009, with a view of catering the requirements of higher education of the qualified and eligible students in Kegalle District.</p>
    <a href="https://atikegalle.com/" target="_blank" class="btn btn-primary">Visit ATI Kegalle</a> </div>
  <!--Grid column--> 
  
</div>
<?php
        require 'conn.php';
        $sql = "SELECT * FROM `announcements` ORDER BY `adate` DESC LIMIT 1;";
        $result = mysqli_query( $conn, $sql );
        if ( mysqli_num_rows( $result ) > 0 ) {
          $row = mysqli_fetch_assoc( $result );
			echo('
				<div class="row"> 
  
  <!--Grid column-->
  <div class="col-lg-12 col-md-12 mb-4"> 
    
    <!--Card-->
    <div class="card border border-danger"> 
      
      <!--Card content-->
      <div class="card-body"> 
        <!--Title-->
        <h4 class="card-title">Announcement on '.$row["adate"].'</h4>
        <!--Text-->
        
        <p class="card-text">'.$row["aBody"].'</p>
      </div>
    </div>
    <!--/.Card--> 
    
  </div>
</div>
			');

        } 
        ?>
<!-- main content -->

<div class="counter ">
  <p>Today Visitor counter:</p>
	<?php
	require 'conn.php';
        $sql = "SELECT COUNT(ViNIC) FROM (SELECT `visitor_log`.`ViNIC` FROM `visitor_log` WHERE `visitor_log`.`Date`= CURDATE() UNION ALL SELECT `member_log`.`MemUName` FROM `member_log` WHERE `member_log`.`Date`=CURDATE())X";
        $result = mysqli_query( $conn, $sql );
        if ( mysqli_num_rows( $result ) > 0 ) {
          $row = mysqli_fetch_assoc( $result );
			echo('<h3 id="count">'.$row["COUNT(ViNIC)"].'</h3>');
		}
	?>
  
</div>
<br>
<!-- Footer -->
<footer class="footer text-center text-white fixed-bottom">
  <div class="text-center p-0" style="background-color: rgba(0, 0, 0, 0.774);"> Made with ❤️ by HNDIT 2019 batch. </div>
</footer>

<!-- MDB --> 
<script
    type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js"
    ></script> 
<script type="text/javascript" src="/counter.js"></script>
</body>
</html>
