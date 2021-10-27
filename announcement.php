<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>ATI Kegalle - Announcements</title>
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

<br />
<!-- Content-->
<div class="container">
  <div class="row" id="ann-heading">
    <div class="col-md-12">
      <h1>Important Announcements</h1>
    </div>
  </div>
  <br />
  <?php
  require 'conn.php';
  $sql = "SELECT `adate`, `aBody` FROM `announcements` ORDER BY `adate` DESC";
  $result = $conn->query( $sql );

  if ( $result->num_rows > 0 ) {
    // output data of each row
    while ( $row = $result->fetch_assoc() ) {
      
	echo('
	<div class="card"> 
    <!--Card content-->
    <div class="card-body"> 
      <!--Title-->
      <h4 class="card-title">'. $row[ "adate" ] .'</h4>
      <!--Text-->
      <p class="card-text">'. $row[ "aBody" ] .'</p>
    </div>
  </div>
	');	
    }
  } else {
    echo "0 results";
  }
  $conn->close();
  ?>
  <!--Card-->
  
  <!--/.Card--> 
  <br />
</div>
<br />
<!-- Footer -->
<footer class="footer text-center text-white fixed-bottom">
  <div
				class="text-center p-0"
				style="background-color: rgba(0, 0, 0, 0.774)"
			> Made with ❤️ by HNDIT 2019 batch. </div>
</footer>

<!-- MDB --> 
<script
			type="text/javascript"
			src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js"
		></script>
</body>
</html>
