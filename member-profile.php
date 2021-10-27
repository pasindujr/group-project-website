<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>ATI Kegalle - Your Profile</title>
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
<?php
session_start();
if ( isset( $_SESSION[ "member" ] ) && $_SESSION[ "member" ] != "" ) {
  require 'conn.php';
  $sql = "SELECT * FROM `member` WHERE `MemUName`='" . $_SESSION[ "member" ] . "';";
  $result = mysqli_query( $conn, $sql );
  if ( mysqli_num_rows( $result ) > 0 ) {
    $row = mysqli_fetch_assoc( $result );
    $uname = $row[ 'MemUName' ];
    $name = $row[ 'MemName' ];
    $dob = $row[ 'MemDOB' ];
    $add = $row[ 'MemAddress' ];
    $dep = $row[ 'MemDept' ];
    $des = $row[ 'MemDesig' ];
    $age = $row[ 'MemAge' ];
    $nic = $row[ 'MemNIC' ];
    $gender = $row[ 'MemGender' ];
    $phone = $row[ 'MemMobile' ];
    $email = $row[ 'MemEmail' ];

  } else {
   header( "location:member-login-profile.php?status=fail" );
  }
} else {
  header( "location:member-login-profile.php" );
  exit;
}
?>
<!-- Navbar -->
<?php require_once "assets/navbar.php"; ?>
<!-- Navbar --> 
<br />
<!-- Content-->
<div class="container mb-5">
  <div class="row">
    <div class="col-12">
      <h2 class="text-center">Your Profile</h2>
    </div>
  </div>
  <br />
  <div class="row">
    <div class="col-12">
      <table class="table">
        <tbody>
          <tr>
            <th scope="row"></th>
            <td>Name</td>
            <td><p><?php echo($name) ?></p></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>User Name</td>
            <td><p><?php echo($uname) ?></p></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td>Department</td>
            <td><p><?php echo($dep) ?></p></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td>Designation</td>
            <td><p><?php echo($des) ?></p></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td>NIC</td>
            <td><p><?php echo($nic) ?></p></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td>Birthday</td>
            <td><p><?php echo($dob) ?></p></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td>Age</td>
            <td><p><?php echo($age) ?></p></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td>Address</td>
            <td><p><?php echo($add)?></p></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td>Gender</td>
            <td><p><?php echo($gender)?></p></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td>Mobile</td>
            <td><p><?php echo($phone)?></p></td>
          </tr>
          <tr>
            <th scope="row"></th>
            <td>Email</td>
            <td><p><?php echo($email)?></p></td>
          </tr>
        </tbody>
      </table>
      <div class="text-center pb-3">
        <form action="member-profile.php" method="post">
          <a href="member-edit.php">
          <button type="button" class="btn btn-success">Edit Profile</button>
          </a>
          <button type="submit" style="background-color: red;" class="btn btn-success" name="logout">Logout</button>
        </form>
        <?php
        if ( isset( $_POST[ 'logout' ] ) ) {
          unset( $_SESSION );
          session_destroy();
          echo "<script> location.href='member-login-profile.php'; </script>";
        }
        ?>
      </div>
    </div>
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
