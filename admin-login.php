<!doctype html>
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
<title>ATI Kegalle - Admin</title>
<!-- Required bootstrap CSS --> <!-- Font Awesome -->
<link href="snackbar.css" rel="stylesheet"/>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.css" rel="stylesheet" />
<link rel="stylesheet" href="loginstyle.css" />
</head>
<body class="main-bg">
<div id="snackbar">Incorrect Username/Password Plese recheck and enter again</div>
<script type="text/javascript" src="snackbar.js"></script>
<?php
session_start();
if ( isset( $_SESSION[ "admin" ] ) && $_SESSION[ "admin" ] != "" ) {
  header( "location:reports.php" );
  exit;
}
?>

<!-- Navbar -->
<?php require_once "assets/navbar.php"; ?>
<!-- Navbar --> 

<!--These links should be deleted--> should be deleted<br>
<a href="admin-forms.html">Admin forms</a><br>
<!--Login form-->
<div class="login-container text-c animated flipInX">
  <div>
    <h1 class="logo-badge text-whitesmoke"> <span class="fas fa-user-cog"></span> </h1>
  </div>
  <h3 class="text-whitesmoke">Admin Log In</h3>
  <div class="container-content">
    <form method="post" action="admin-login.php">
      <!-- Email input -->
      <div class="form-outline mb-4">
        <input type="text" class="form-control" name="username" required/>
        <label class="form-label" for="form1Example1">Username</label>
      </div>
      <!-- Password input -->
      <div class="form-outline mb-4">
        <input type="password" class="form-control" name="password" required/>
        <label class="form-label" for="form1Example2">Password</label>
      </div>
      <!-- 2 column grid layout for inline styling -->
      <div class="row mb-4">
        <div class="col d-flex justify-content-center"> <!-- Checkbox -->
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="" id="form1Example3" checked />
            <label class="form-check-label" for="form1Example3"> Remember me </label>
          </div>
        </div>
        <div class="col"> <!-- Simple link --> <a href="#!">Forgot password?</a> </div>
      </div>
      <!-- Submit button -->
      <button type="submit" class="btn btn-primary btn-block" name="submit"> Log in </button>
    </form>
    <?php 
    if ( isset( $_POST[ 'submit' ] ) ) {
      require 'conn.php';
      $username = mysqli_real_escape_string( $conn, $_POST[ 'username' ] );
      $password = mysqli_real_escape_string( $conn, $_POST[ 'password' ] );
      $sql = "SELECT `AdUName`,`Adpassword`FROM `admin` WHERE `AdUName` ='" . $username . "' AND `Adpassword` = '" . $password . "';";
      $result = $conn->query( $sql );
      if ( $result->num_rows > 0 ) {
        session_start();
        $_SESSION[ 'admin' ] = $username;
        //header( 'Location:reports.php' );
		  navigate("reports.php");
		  echo("ok");
      } else { /*print(	'<script type="text/javascript"> showmessage("Incorrect Username/Password"); </script>');*/
        //header( 'Location:admin-login.php?status=fail' );
		  navigate("admin-login.php","fail");
		  echo("not ok");
      }
      $conn->close();
    } ?>
    <?php
if ( isset( $_GET[ 'updatestatus' ] ) ) {
  if ( $_GET[ 'updatestatus' ] == "success" ) {

    print( '<script type="text/javascript">
			showmessage("Recode successfully Created");
			</script>' );
  }
  if ( $_GET[ 'updatestatus' ] == "fail" ) {

    print( '<script type="text/javascript">
			showmessage("Recode create fail ' . $_GET[ 'error' ] . '");
			</script>' );
  }

}
if ( isset( $_GET[ 'msg' ] ) ) {
  print( '<script type="text/javascript"> showmessage("' . $_GET[ 'msg' ] . '"); </script>' );
}
?>
  </div>
</div>
<!-- Footer -->
<footer class="footer text-center text-white fixed-bottom">
  <div class="text-center p-0" style="background-color: rgba(0, 0, 0, 0.774)" > Made with ❤️ by HNDIT 2019 batch. </div>
</footer>
<!-- MDB --> <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js" ></script>
</body>
</html>
