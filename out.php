<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<link href="snackbar.css" rel="stylesheet"/>
</head>

<body>
<div id="snackbar">Incorrect Username/Password Plese recheck and enter again</div>
<script type="text/javascript" src="snackbar.js"></script>
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
if ( isset( $_SESSION[ "member-visit" ] ) && $_SESSION[ "member-visit" ] != "" ) {

  if ( isset( $_COOKIE[ 'date' ] ) && isset( $_COOKIE[ 'timein' ] ) && $_COOKIE[ 'date' ] == date( "Y-m-d" ) ) {

  } else {
    unset( $_SESSION );
    session_destroy();
    if ( isset( $_COOKIE[ 'date' ] ) ) {
      unset( $_COOKIE[ 'date' ] );
      setcookie( 'date', null, -1, '/' );
    }
    if ( isset( $_COOKIE[ 'timein' ] ) ) {
      unset( $_COOKIE[ 'timein' ] );
      setcookie( 'timein', null, -1, '/' );
    }
    navigate( "member-enter.php" );
  }

  require 'conn.php';
  $sql = "SELECT * FROM `member` WHERE `MemUName`='" . $_SESSION[ "member-visit" ] . "';";
  $result = mysqli_query( $conn, $sql );
  if ( mysqli_num_rows( $result ) > 0 ) {
    $row = mysqli_fetch_assoc( $result );
    $uname = $row[ 'MemName' ];
  } else {
    navigate( "member-enter.php","incorrect username" );
    exit;
  }
  $conn->close();


} elseif ( isset( $_SESSION[ "visitor-visit" ] ) && $_SESSION[ "visitor-visit" ] != "" ) {
  if ( isset( $_COOKIE[ 'date' ] ) && isset( $_COOKIE[ 'timein' ] ) && $_COOKIE[ 'date' ] == date( "Y-m-d" ) ) {

  } else {
    unset( $_SESSION );
    session_destroy();
    if ( isset( $_COOKIE[ 'date' ] ) ) {
      unset( $_COOKIE[ 'date' ] );
      setcookie( 'date', null, -1, '/' );
    }
    if ( isset( $_COOKIE[ 'timein' ] ) ) {
      unset( $_COOKIE[ 'timein' ] );
      setcookie( 'timein', null, -1, '/' );
    }
    navigate( "visitor-enter.php" );
  }

  require 'conn.php';
  $sql = "SELECT * FROM `visitor` WHERE `ViNIC`='" . $_SESSION[ "visitor-visit" ] . "';";
  $result = mysqli_query( $conn, $sql );
  if ( mysqli_num_rows( $result ) > 0 ) {
    $row = mysqli_fetch_assoc( $result );
    $uname = $row[ 'ViName' ];
  } else {
    navigate( "visitor-enter.php" );
    exit;
  }
  $conn->close();
} else {
  navigate( "index.php" );
}

?>
<h1>You checked in as <?php echo($uname); ?></h1>
<h2>Date : <?php echo($_COOKIE[ "date" ]); ?></h2>
<h2>time : <?php echo($_COOKIE[ "timein" ]); ?></h2>
<h3><?php echo date_default_timezone_get(); ?></h3>
<form method="post" action="out.php">
  <button type="submit" name="out">Mark out</button>
</form>
<?php
if ( isset( $_POST[ 'out' ] ) ) {
	
	if(isset($_SESSION[ "member-visit" ])){
		require 'conn.php';

  $sql = "UPDATE `member_log` SET `TimeOut`='" . date( "H:i:s" ) . "' WHERE `MemUName`= '" . $_SESSION[ "member-visit" ] . "' AND `Date` = '" . $_COOKIE[ "date" ] . "' AND `TimeIn`='" . $_COOKIE[ "timein" ] . "';";
  echo( $sql );
  if ( $conn->query( $sql ) === TRUE ) {
    unset( $_SESSION );
    session_destroy();
    if ( isset( $_COOKIE[ 'date' ] ) ) {
      unset( $_COOKIE[ 'date' ] );
      setcookie( 'date', null, -1, '/' );
    }
    if ( isset( $_COOKIE[ 'timein' ] ) ) {
      unset( $_COOKIE[ 'timein' ] );
      setcookie( 'timein', null, -1, '/' );
    }
    navigate( "member-enter.php" );
  } else {
    navigate( "out.php", $conn->error );
  }
  $conn->close();
	}elseif(isset($_SESSION[ "visitor-visit" ])){
		require 'conn.php';
		$sql="UPDATE `visitor_log` SET `TimeOut`='" . date( "H:i:s" ) . "' WHERE `ViNIC`= '" . $_SESSION[ "visitor-visit" ] . "' AND `Date`='" . $_COOKIE[ "date" ] . "' AND `TimeIn`= '" . $_COOKIE[ "timein" ] . "'";
  echo( $sql );
  if ( $conn->query( $sql ) === TRUE ) {
    unset( $_SESSION );
    session_destroy();
    if ( isset( $_COOKIE[ 'date' ] ) ) {
      unset( $_COOKIE[ 'date' ] );
      setcookie( 'date', null, -1, '/' );
    }
    if ( isset( $_COOKIE[ 'timein' ] ) ) {
      unset( $_COOKIE[ 'timein' ] );
      setcookie( 'timein', null, -1, '/' );
    }
    navigate( "member-enter.php" );
  } else {
    echo( $conn->error );
  }
  $conn->close();
	}

  
}
?>
</body>
</html>