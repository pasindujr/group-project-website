<!doctype html>
<html lang="en">
<?php

function navigate( $location = null, $msg = null ) {
  if ( $msg == null ) {
    echo '<script>window.location.replace("' . $location . '");</script>';
  } else {
    echo '<script>window.location.replace("' . $location . '?msg=' . $msg . '");</script>';
  }
}
?>
<head>
<meta charset="utf-8">
<link href="snackbar.css" rel="stylesheet"/>
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>ATI Kegalle - Forget Password</title>
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
<div id="snackbar">Incorrect Username/Password Plese recheck and enter again</div>
<script type="text/javascript" src="snackbar.js"></script> 

<!-- Navbar -->
<?php require_once "assets/navbar.php"; ?>
<!-- Navbar --> 

<!-- Content -->
<div class="container">
  <div class="login-container text-center">
    <div>
      <h1 class="logo-badge"><span class="fas fa-address-book"></span></h1>
    </div>
    <h3 class="text-whitesmoke mb-4">Reset Password</h3>
    <?php
    if ( isset( $_POST[ "submit" ] ) ) {
      require 'conn.php';
      $sql = "SELECT `MemUName`, `MemQ1`, `MemAns1`, `MemQ2`, `MemAns2` FROM `member` WHERE `MemUName`='".$_POST["uname"]."'";
      $result = $conn->query( $sql );

      if ( $result->num_rows > 0 ) {
       $row = $result->fetch_assoc();
        
      } else {
        echo "0 results";
      }
      $conn->close();
    }
	if ( isset( $_POST[ "save" ] ) ) {
	  require 'conn.php';
      $sql = "SELECT `MemUName`, `MemQ1`, `MemAns1`, `MemQ2`, `MemAns2` FROM `member` WHERE `MemUName`='".$_POST["uname"]."'";
      $result = $conn->query( $sql );

      if ( $result->num_rows > 0 ) {
       $row = $result->fetch_assoc();
        if($row["MemAns1"]==$_POST["ans1"] && $row["MemAns2"]==$_POST["ans2"]){
			require 'conn.php';

    $sql = "UPDATE `member` SET `Mempassword`='".$_POST["pass"]."' WHERE `MemUName`='".$_POST["uname"]."';";

    if ( $conn->query( $sql ) === TRUE ) {
		navigate("forget-password.php","Password changed");
	}else{
		navigate("forget-password.php","Password not changed");
	}
		}else{
			navigate("forget-password.php","Password not changed");
		}
      } else {
        echo "0 results";
      }
      $conn->close();
	}
	 
    ?>
    <form method="post" action="forget-password.php">
      <div class="col d-flex justify-content-center"> 
        <!-- Username input -->
        <div class="form-outline mb-3">
          <input type="text" name="uname" id="form1Example1" class="form-control" value="<?php if ( isset( $row["MemUName"] ) ) {echo( $row["MemUName"]);} ?>" />
          <label class="form-label " for="form1Example1">Enter Username</label>
        </div>
      </div>
      <!-- Submit button -->
      <button type="submit" class="btn btn-primary mb-3" name="submit">Submit</button>
      <div class="col d-flex justify-content-center"> 
        <!-- Question 1 input -->
        <div class="form-outline mb-4 ">
          <input type="text" id="form1Example2" class="form-control" value="<?php if ( isset( $row["MemQ1"] ) ) {echo( $row["MemQ1"]);} ?>" disabled/>
          <label class="form-label" for="form1Example2">Security Question 1</label>
        </div>
      </div>
      <div class="col d-flex justify-content-center"> 
        <!-- Question 1 answer input -->
        <div class="form-outline mb-3">
          <input type="text" id="form1Example1" name="ans1" class="form-control" />
          <label class="form-label " for="form1Example1">Question 1 answer</label>
        </div>
      </div>
      <div class="col d-flex justify-content-center"> 
        <!-- Question 2 input -->
        <div class="form-outline mb-4 ">
          <input type="text" id="form1Example2" class="form-control" value="<?php if ( isset( $row["MemQ1"] ) ) {echo( $row["MemQ1"]);} ?>" disabled/>
          <label class="form-label" for="form1Example2">Security Question 2</label>
        </div>
      </div>
      <div class="col d-flex justify-content-center"> 
        <!-- Question 2 answer input -->
        <div class="form-outline mb-3">
          <input type="text" id="form1Example1" name="ans2" class="form-control" />
          <label class="form-label " for="form1Example1">Question 2 answer</label>
        </div>
      </div>
      
      <!-- Reset button --> 
      <!--<button type="submit" class="btn btn-primary mb-3">Reset</button>-->
      
      <div class="col d-flex justify-content-center"> 
        <!-- New password answer input -->
        <div class="form-outline mb-3">
          <input type="password" id="form1Example1" class="form-control" />
          <label class="form-label " for="form1Example1">New Password</label>
        </div>
      </div>
      <div class="col d-flex justify-content-center"> 
        <!-- Confirm password answer input -->
        <div class="form-outline mb-3">
          <input type="password" id="form1Example1" name="pass" class="form-control" />
          <label class="form-label " for="form1Example1">Confirm Password</label>
        </div>
      </div>
      
      <!-- Reset button -->
      <button type="submit" class="btn btn-success mb-3" name="save">Save New Password</button>
      
      <!-- 2 column grid layout for inline styling -->
      <div class="row mb-4">
        <div class="col d-flex justify-content-center">
          <div class="col"> 
            <!-- Simple link --> 
            <a href="login.html"
                >Back to Login</a
              > </div>
        </div>
      </div>
    </form>
  </div>
</div>
<br />
<!-- /Content --> 

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
</body>
</html>