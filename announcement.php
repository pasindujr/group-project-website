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
<nav class="navbar navbar-expand-lg navbar-dark mb-3" style="background-color:#03045e;"> 
  <!-- Container wrapper -->
  <div class="container-fluid"> 
    
    <!-- Navbar brand --> 
    <a class="navbar-brand" href="index.html"><img src="assets/logo.png" width="30" height="30" alt=""></a> 
    
    <!-- Toggle button -->
    <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
    
    <!-- Collapsible wrapper -->
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
        
        <!-- Link -->
        <li class="nav-item"> <a class="nav-link" href="announcement.html">Announcements</a> </li>
        <li class="nav-item"> <a class="nav-link" href="gallery.html">Gallery</a> </li>
        <li class="nav-item"> <a class="nav-link" href="contact.html">Contact Us</a> </li>
        <li class="nav-item"> <a class="nav-link" href="member-enter.html">
          <text style="color: aqua;"><strong>Enter ATI</strong> </text>
          </a> </li>
        <!-- Login Dropdown -->
        <li class="nav-item dropdown"> <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false"> <i class="fa fa-fw fa-user"></i> </a> 
          <!-- Dropdown menu -->
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li> <a class="dropdown-item" href="profile.html">Your Profile</a> </li>
            <li> <a class="dropdown-item" href="register.html">Register</a> </li>
            <li> <a class="dropdown-item" href="login.html">Login</a> </li>
          </ul>
        </li>
      </ul>
    </div>
  </div>
  <!-- Container wrapper --> 
</nav>
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
