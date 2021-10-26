<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>ATI Kegalle - Add and edit content</title>
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
<?php

function navigate( $location = null, $msg = null ) {
  if ( $msg == null ) {
    echo '<script>window.location.replace("' . $location . '");</script>';
  } else {
    echo '<script>window.location.replace("' . $location . '?msg=' . $msg . '");</script>';
  }
}
session_start();
if ( isset( $_SESSION[ "admin" ] ) && $_SESSION[ "admin" ] != "" ) {
  require 'conn.php';
  $sql = "SELECT `AdUName` FROM `admin` WHERE `AdUName` ='" . $_SESSION[ "admin" ] . "';";
  $result = mysqli_query( $conn, $sql );
  if ( mysqli_num_rows( $result ) > 0 ) {
    $row = mysqli_fetch_assoc( $result );
    $uname = $row[ 'AdUName' ];

  } else {
    header( "location:admin-login.php?status=fail" );
  }
} else {
  header( "location:admin-login.php" );
  exit;
}
?>
<!-- Navbar -->
<?php require_once "assets/navbar.php"; ?>
<!-- Navbar --> 

<!--Content--> 

<!--Edit Announcements-->
<div class="container mb-5">
  <form method="post" action="admin-edit.php">
    <h4 class="text-center p-3">Edit Announcements</h4>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">Date</th>
          <th scope="col">Announcement</th>
          <th scope="col">isSelect</th>
        </tr>
      </thead>
      <tbody>
        <?php
        require 'conn.php';
        $sql = "SELECT `aID`, `adate`, `aBody` FROM `announcements` ORDER BY `adate` DESC";
        $result = $conn->query( $sql );

        if ( $result->num_rows > 0 ) {
          // output data of each row
          while ( $row = $result->fetch_assoc() ) {
            //echo "id: " . $row[ "id" ] . " - Name: " . $row[ "firstname" ] . " " . $row[ "lastname" ] . "<br>";
            echo(
              '<tr>
        <th scope="row">' . $row[ "adate" ] . '</th>
        <td>' . $row[ "aBody" ] . '</td>
        <td><div>
            <input
									class="form-check-input"
									type="checkbox"
									id="checkboxNoLabel"
									name="select[]"
									value="' . $row[ "aID" ] . '"
									aria-label="..."
								/>
          </div></td>
      </tr>'
            );


          }
        } else {
          echo "0 results";
        }
        $conn->close();

        ?>
      </tbody>
    </table>
    <!-- Delete button -->
    <div class="container text-center">
      <button type="submit" value="delete" name="delete" class="btn btn-danger">Delete</button>
    </div>
  </form>
</div>
<?php
if ( isset( $_POST[ 'delete' ] ) ) {
  $select = $_POST[ 'select' ];
  for ( $i = 0; $i < count( $select ); $i++ ) {

    require 'conn.php';

    $sql = "DELETE FROM `announcements` WHERE `aID`=" . $select[ $i ] . ";";

    if ( $conn->query( $sql ) === TRUE ) {
      //echo "Record deleted successfully";
      $ck = true;
    } else {
      //echo "Error deleting record: " . $conn->error;
      $ck = false;
    }


  }
  //echo( '<script>location.reload();</script>' );
  if ( $ck == true ) {
    echo '<script>window.location.replace("admin-edit.php?msg=Announcement/s Deleted");</script>';
  } else {

    echo '<script>window.location.replace("admin-edit.php?updatestatus=fail&error=' . $conn->error . '");</script>';
  }
  $conn->close();

}

if ( isset( $_POST[ 'submit' ] ) ) {
  require 'conn.php';

  $sql = "INSERT INTO `announcements`(`adate`, `aBody`) VALUES ('" . $_POST[ 'date' ] . "','" . $_POST[ 'txt' ] . "');";

  if ( $conn->query( $sql ) === TRUE ) {
    navigate( "admin-edit.php", "success" );
  } else {
    //header('Location:admin-edit.php?updatestatus=fail&error='. $conn->error);
    navigate( "admin-edit.php", "fail" );
  }

  $conn->close();
}

if ( isset( $_POST[ 'upload' ] ) ) {
	$target_dir = "assets/";
	$target_file = $target_dir . basename($_FILES["image"]["name"]);
	$uploadOk = 1;
	$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	// Check if image file is a actual image or fake image

  $check = getimagesize($_FILES["image"]["tmp_name"]);
  if($check !== false) {
    //echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    //echo "File is not an image.";
	navigate( "admin-edit.php", "File is not an image." );
    $uploadOk = 0;
  }
	if (file_exists($target_file)) {
  //echo "Sorry, file already exists.";
		navigate( "admin-edit.php", "Sorry, file already exists." );
  $uploadOk = 0;
	}
	if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}
	
	if ($uploadOk == 0) {
  //echo "Sorry, your file was not uploaded.";
		navigate( "admin-edit.php", "Sorry, your file was not uploaded." );
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
    //echo "The file ". htmlspecialchars( basename( $_FILES["img"]["name"])). " has been uploaded.";
	navigate( "admin-edit.php", "The file ". htmlspecialchars( basename( $_FILES["image"]["name"])). " has been uploaded." );
  } else {
    //echo "Sorry, there was an error uploading your file.";
	navigate( "admin-edit.php", "Sorry, there was an error uploading your file." );
  }
}
}
?>
<div class="container">
  <form method="post" action="admin-edit.php">
    <div class="input-group input-group-sm mb-3"> <span class="input-group-text" id="inputGroup-sizing-sm">Date</span>
      <input
					type="date"
		   			name="date"
					class="form-control"
					aria-label="Sizing example input"
					aria-describedby="inputGroup-sizing-sm"
				/>
    </div>
    <div class="input-group mb-3"> <span class="input-group-text" id="inputGroup-sizing-default"
					>Description</span
				>
      <textarea
					style="height: 100px"
					class="form-control"
			  		name="txt"
					aria-label="Sizing example input"
					aria-describedby="inputGroup-sizing-default"
			  ></textarea>
    </div>
    <!-- Submit button -->
    <div class="container text-center">
      <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
  </form>
</div>
<hr />

<!-- Update gallery -->

<div class="container mb-5">
  <form method="post" action="admin-edit.php" enctype="multipart/form-data">
    <h4 class="text-center p-3">Update Gallery</h4>
    <label class="form-label" for="customFile"
				>Select a photo</label
			>
    <input type="file" name="image" class="form-control" id="image" accept="image/png,image/jpg,image/jpeg "/>
    
    <!-- Upload button -->
    <div class="container text-center mt-4">
      <button type="submit" name="upload" class="btn btn-primary">Upload</button>
    </div>
  </form>
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
