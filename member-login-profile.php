<html lang="en">
<head>
	<?php
	function navigate( $location = null, $msg = null ) {
  if ( $msg == null ) {
    echo '<script>window.location.replace("' . $location . '");</script>';
  } else {
    echo '<script>window.location.replace("' . $location . '?msg=' . $msg . '");</script>';
  }
}
	?>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>ATI Kegalle - Login</title>
	<link href="snackbar.css" rel="stylesheet"/>
<!-- Required bootstrap CSS --> 
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
<link rel="stylesheet" href="loginstyle.css" />
</head>

<body class="main-bg">
	<div id="snackbar">Incorrect Username/Password Plese recheck and enter again</div>
	<script type="text/javascript" src="snackbar.js"></script>
	<?php
		session_start();
		if(isset($_SESSION["member"]) && $_SESSION["member"] != ""){
    		//header("location:member-profile.php");
			navigate("member-profile.php");
    		exit;
		}
	?>
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

<!--Login form-->

<div class="login-container text-c animated flipInX">
  <div>
    <h1 class="logo-badge text-whitesmoke"> <span class="fa fa-user-circle"></span> </h1>
  </div>
  <h3 class="text-whitesmoke">Member Log In</h3>
  <p class="text-whitesmoke">Log In</p>
  <div class="container-content">
    <form class="margin-t" method="post" action="member-login-profile.php" >
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Username" required name="username"/>
      </div>
      <div class="form-group">
        <input type="password" class="form-control" placeholder="*****" required name="password"/>
      </div>
      <button type="submit" class="form-button button-l margin-b" name="submit"> Sign In </button>
      <a class="text-darkyellow" href="forget-password.php"
						><small>Forgot your password?</small></a>
      <p class="text-whitesmoke text-center"> <small>Do not have an account?</small> </p>
      <a class="text-darkyellow" href="member-register.php"><small>Sign Up</small></a>
    </form>
	  <?php
	  	
	  
	  	if ( isset( $_POST[ 'submit' ] ) ) {
    		require 'conn.php';
			$username = mysqli_real_escape_string( $conn, $_POST[ 'username' ] );
			$password = mysqli_real_escape_string( $conn, $_POST[ 'password' ] );
			$sql="SELECT * FROM `member` WHERE `MemUName`='" . $username . "' AND `Mempassword`='" . $password . "';";
			$result = $conn->query( $sql );

		if ( $result->num_rows > 0 ) {
			session_start();
			$_SESSION['member']=$username;
			//header('Location:member-profile.php');
			navigate("member-profile.php");
		} else {
		/*print(	'<script type="text/javascript">
			showmessage("Incorrect Username/Password");
			</script>');*/
			//header('Location:member-login-profile.php?status=fail');
			navigate("member-login-profile.php","Failed");
		}
		$conn->close();
		}
	  ?>
	  <?php if ( isset( $_GET[ 'status' ] ) ) { if ( $_GET[ 'status' ] == "success" ) { print( '<script type="text/javascript"> showmessage("Recode successfully Deleted"); </script>' ); } if ( $_GET[ 'status' ] == "fail" ) { print( '<script type="text/javascript"> showmessage("Incorrect Username/Password"); </script>' ); }   } if ( isset( $_GET[ 'msg' ] ) ) { echo($_GET[ 'msg' ]); print( '<script type="text/javascript"> showmessage("' . $_GET[ 'msg' ] . '"); </script>' ); } ?>
  </div>
</div>

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
