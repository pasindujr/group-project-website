<?php
if ( isset( $_POST[ 'submit' ] ) ) {
    require 'conn.php';

    $sql = "INSERT INTO `member`(`MemUName`, `MemName`, `Mempassword`, `MemDOB`, `MemAddress`, `MemDept`, `MemDesig`, `MemAge`, `MemNIC`, `MemGender`, `MemMobile`, `MemEmail`, `MemQ1`, `MemAns1`, `MemQ2`, `MemAns2`) VALUES ('" . $_POST[ 'uname' ] . "','" . $_POST[ 'name' ] . "','" . $_POST[ 'password' ] . "','" . $_POST[ 'dob' ] . "','" . $_POST[ 'add' ] . "','" . $_POST[ 'dep' ] . "','" . $_POST[ 'des' ] . "','" . $_POST[ 'age' ] . "','" . $_POST[ 'nic' ] . "','" . $_POST[ 'gender' ] . "','" . $_POST[ 'phone' ] . "','" . $_POST[ 'email' ] . "','" . $_POST[ 'q1' ] . "','" . $_POST[ 'a1' ] . "','" . $_POST[ 'q2' ] . "','" . $_POST[ 'a2' ] . "')";

    if ( $conn->query( $sql ) === TRUE ) {
      header('Location:member-register.php?updatestatus=success');
    } else {
		header('Location:member-register.php?updatestatus=fail&error='. $conn->error);
		
    }

    $conn->close();
  }
?>