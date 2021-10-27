<!DOCTYPE html>
<?php
date_default_timezone_set( "Asia/Colombo" );
function navigate( $location = null, $msg = null ) {
  if ( $msg == null ) {
    echo '<script>window.location.replace("' . $location . '");</script>';
  } else {
    echo '<script>window.location.replace("' . $location . '?msg=' . $msg . '");</script>';
  }
}



session_start();
if ( isset( $_SESSION[ "visitor-visit" ] ) && $_SESSION[ "visitor-visit" ] != "" ) {
  navigate( "out.php" );
  exit;
}
?>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>ATI Kegalle - Enter as a Visitor</title>
<link href="snackbar.css" rel="stylesheet"/>
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

<!--Content-->
<div class="container">
  <div class="login-container text-center">
    <div>
      <h1 class="logo-badge"><span class="fas fa-address-book"></span></h1>
    </div>
    <h3 class="text-whitesmoke mb-4">Enter as a Visitor</h3>
    <?php
    if ( isset( $_POST[ "search" ] ) ) {

      require 'conn.php';
      $sql = "SELECT `ViName`, `ViNIC`, `ViEmail`, `ViDob`, `ViAge`, `ViAddress`, `ViGender`, `ViMobile`, `ViReason` FROM `visitor` WHERE `ViNIC`='" . $_POST[ "nic" ] . "';";
      $result = $conn->query( $sql );

      if ( $result->num_rows > 0 ) {
        // output data of each row
        $row = $result->fetch_assoc();
        echo "working";


      } else {
        navigate( 'visitor-enter.php', 'NIC is not registerd' );
      }
      $conn->close();

    }

    if ( isset( $_POST[ "submit" ] ) ) {
      require 'conn.php';
      $username = mysqli_real_escape_string( $conn, $_POST[ 'nic' ] );
      $sql = "SELECT * FROM `visitor` WHERE `ViNIC`='" . $username . "';";
      $result = $conn->query( $sql );
      if ( $result->num_rows > 0 ) {
        require 'conn.php';
        $sql = "INSERT INTO `visitor_log`(`ViNIC`, `Date`, `TimeIn`) VALUES ('" . $_POST[ 'nic' ] . "','" . date( "Y-m-d" ) . "','" . date( "H:i:s" ) . "')";
        if ( $conn->query( $sql ) === TRUE ) {
          session_start();
          $_SESSION[ 'visitor-visit' ] = $_POST[ 'nic' ];
          setcookie( "date", date( "Y-m-d" ), time() + ( 86400 * 30 ), "/" );
          setcookie( "timein", date( "H:i:s" ), time() + ( 86400 * 30 ), "/" );
          navigate( 'out.php' );
        } else {
          navigate( 'visitor-enter.php', $conn->error );
        }
        $conn->close();
      } else {
        //navigate( 'visitor-enter.php?status=fail' );

        echo( "No recode" );

        require 'conn.php';
        $sql = "INSERT INTO `visitor`(`ViName`, `ViNIC`, `ViEmail`, `ViDob`, `ViAge`, `ViAddress`, `ViGender`, `ViMobile`, `ViReason`) VALUES ('" . $_POST[ 'vname' ] . "','" . $_POST[ 'nic' ] . "','" . $_POST[ 'mail' ] . "','" . $_POST[ 'dob' ] . "','" . $_POST[ 'age' ] . "','" . $_POST[ 'add' ] . "','" . $_POST[ 'gender' ] . "','" . $_POST[ 'phone' ] . "','" . $_POST[ 'reson' ] . "')";
        if ( $conn->query( $sql ) === TRUE ) {
          require 'conn.php';
          $sql = "INSERT INTO `visitor_log`(`ViNIC`, `Date`, `TimeIn`) VALUES ('" . $_POST[ 'nic' ] . "','" . date( "Y-m-d" ) . "','" . date( "H:i:s" ) . "')";
          if ( $conn->query( $sql ) === TRUE ) {
            session_start();
            $_SESSION[ 'visitor-visit' ] = $_POST[ 'nic' ];
            setcookie( "date", date( "Y-m-d" ), time() + ( 86400 * 30 ), "/" );
            setcookie( "timein", date( "H:i:s" ), time() + ( 86400 * 30 ), "/" );
            navigate( 'out.php' );
          } else {
            navigate( 'visitor-enter.php', $conn->error );
          }
        } else {
          navigate( 'visitor-enter.php', $conn->error );
        }


        $conn->close();

      }
      $conn->close();

    }
    ?>
    <form method="post" action="visitor-enter.php">
      <div class="col d-flex justify-content-center"> 
        <!-- NIC input -->
        <div class="form-outline mb-4">
          <input type="text" id="form1Example2" name="nic" value="<?php if ( isset( $row["ViNIC"] ) ) {echo( $row["ViNIC"]);} ?>" class="form-control" />
          <label class="form-label" for="form1Example2">NIC</label>
        </div>
        <button type="submit" name="search" class="btn btn-primary mb-3">Search</button>
      </div>
      <div class="col d-flex justify-content-center"> 
        <!-- Name input -->
        <div class="form-outline mb-4">
          <input type="text" id="form1Example2"  name="vname" value="<?php if ( isset( $row["ViName"] ) ) {echo( $row["ViName"]);} ?>" class="form-control" />
          <label class="form-label" for="form1Example2">Name</label>
        </div>
      </div>
      <div class="col d-flex justify-content-center"> 
        <!-- Email input -->
        <div class="form-outline mb-4">
          <input type="text" name="mail" id="form1Example2" value="<?php if ( isset( $row["ViEmail"] ) ) {echo( $row["ViEmail"]);} ?>" class="form-control" />
          <label class="form-label" for="form1Example2">Email</label>
        </div>
      </div>
      <div class="col d-flex justify-content-center"> 
        <!-- DOB input -->
        <div class="form-outline mb-4">
          <input type="date" name="dob" id="form1Example2" value="<?php if ( isset( $row["ViDob"] ) ) {echo( $row["ViDob"]);} ?>" class="form-control" />
          <label class="form-label" for="form1Example2"
								>Date of Birth</label
							>
        </div>
      </div>
      <div class="col d-flex justify-content-center"> 
        <!-- Age input -->
        <div class="form-outline mb-4">
          <input type="text" name="age" id="form1Example2" value="<?php if ( isset( $row["ViAge"] ) ) {echo( $row["ViAge"]);} ?>" class="form-control" />
          <label class="form-label" for="form1Example2">Age</label>
        </div>
      </div>
      <div class="col d-flex justify-content-center"> 
        <!-- Address input -->
        <div class="form-outline mb-4">
          <input type="text" name="add" id="form1Example2" value="<?php if ( isset( $row["ViAddress"] ) ) {echo( $row["ViAddress"]);} ?>" class="form-control" />
          <label class="form-label" for="form1Example2">Adress</label>
        </div>
      </div>
      <div class="col d-flex justify-content-center"> 
        <!-- Gender select-->
        <div class="mb-4">
          <label class="form-label" for="form6Example5">Gender</label>
          <select name="gender">
            <option value="" disabled selected>Choose your option</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
        </div>
      </div>
      <div class="col d-flex justify-content-center"> 
        <!-- Mobile number input -->
        <div class="form-outline mb-4">
          <input type="tel" name="phone" id="form1Example1" value="<?php if ( isset( $row["ViMobile"] ) ) {echo( $row["ViMobile"]);} ?>" class="form-control" />
          <label class="form-label" for="form1Example1"
								>Mobile number</label
							>
        </div>
      </div>
      <div class="col d-flex justify-content-center"> 
        <!-- Reason input -->
        <div class="form-outline mb-4">
          <input type="text" name="reson" id="form1Example2" value="<?php if ( isset( $row["ViReason"] ) ) {echo( $row["ViReason"]);} ?>" class="form-control" />
          <label class="form-label" for="form1Example2">Reason</label>
        </div>
      </div>
      
      <!-- 2 column grid layout for inline styling -->
      <div class="row mb-4">
        <div class="col d-flex justify-content-center">
          <div class="col"> 
            <!-- Simple link --> 
            <a href="member-enter.php">Go back to Member Submit.</a> </div>
        </div>
      </div>
      
      <!-- Submit button -->
      <button type="submit" name="submit" class="btn btn-primary mb-3">Submit</button>
    </form>
    <?php if ( isset( $_GET[ 'status' ] ) ) { if ( $_GET[ 'status' ] == "success" ) { print( '<script type="text/javascript"> showmessage("Recode successfully Deleted"); </script>' ); } if ( $_GET[ 'status' ] == "fail" ) { print( '<script type="text/javascript"> showmessage("Incorrect Username/Password"); </script>' ); }   } if ( isset( $_GET[ 'msg' ] ) ) { echo($_GET[ 'msg' ]); print( '<script type="text/javascript"> showmessage("' . $_GET[ 'msg' ] . '"); </script>' ); } ?>
  </div>
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
