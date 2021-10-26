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
		if(isset($_SESSION["member"]) && $_SESSION["member"] != ""){
    		require 'conn.php';
			$sql="SELECT * FROM `member` WHERE `MemUName`='".$_SESSION["member"]."';";
			$result = mysqli_query( $conn, $sql );
				if ( mysqli_num_rows( $result ) > 0 ) {
					$row = mysqli_fetch_assoc( $result );
						$uname=$row['MemUName'];
						$name=$row['MemName'];
						$dob=$row['MemDOB'];
						$add=$row['MemAddress'];
						$dep=$row['MemDept'];
						$des=$row['MemDesig'];
						$age=$row['MemAge'];
						$nic=$row['MemNIC'];
						$gender=$row['MemGender'];
						$phone=$row['MemMobile'];
						$email=$row['MemEmail'];
						
				}else{
					header("location:member-login-profile.php?status=fail");
				}
		}else{
			header("location:member-login-profile.php");
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
					<form method="post" action="member-edit.php">
					<table class="table">
						<tbody>
							<tr>
								<th scope="row">1</th>
								<td>Name</td>
								<td>
									<input type="text" id="typeText" class="form-control" required name="name" value="<?php echo($name) ?>"/>
								</td>
							</tr>
							<tr>
								<th scope="row">2</th>
								<td>User Name</td>
								<td>
									<input type="text" id="typeText" class="form-control" readonly name="uname" value="<?php echo($uname) ?>"/>
								</td>
							</tr>
							<tr>
								<th scope="row">3</th>
								<td>Department</td>
								<td>
									<div class="mb-4">
										<select name="dep">
											<option value="" disabled selected>Choose your option</option>
											<option value="IT">IT</option>
											<option value="Accounting">Accounting</option>
											<option value="English">English</option>
											<option value="Project Management">Project Management</option>
										</select>
										<label><?php echo($dep) ?></label>
									</div>
								</td>
							</tr>
							<tr>
								<th scope="row">4</th>
								<td>Designation</td>
								<td>
									<div class="mb-4">
										
										<select name="des">
											<option value="" disabled selected>Choose your option</option>
											<option value="Director">Director</option>
											<option value="Academic">Academic</option>
											<option value="Student">Student</option>
											<option value="Non-academic">Non-academic</option>
										</select>
										<label><?php echo($des) ?></label>
									</div>
								</td>
							</tr>
							<tr>
								<th scope="row">5</th>
								<td>NIC</td>
								<td>
									<input type="text" id="typeText" class="form-control" name="nic" required value="<?php echo($nic) ?>" />
								</td>
							</tr>
							<tr>
								<th scope="row">6</th>
								<td>Birthday</td>
								<td>
									<input type="date" id="typeText" class="form-control" required name="dob" value="<?php echo($dob) ?>"/>
								</td>
							</tr>
							<tr>
								<th scope="row">7</th>
								<td>Age</td>
								<td>
									<input type="number" id="typeNumber" class="form-control" name="age" required value="<?php echo($age) ?>" />
								</td>
							</tr>
							<tr>
								<th scope="row">8</th>
								<td>Address</td>
								<td>
									<input type="text" id="typeText" class="form-control" required name="add" value="<?php echo($add) ?>"/>
								</td>
							</tr>
							<tr>
								<th scope="row">9</th>
								<td>Gender</td>
								<td>
									<select name="gender" required>
										<option value="" disabled selected>
											Choose your option
										</option>
										<option value="Male">Male</option>
										<option value="Female">Female</option>
									</select>
									<label><?php echo($gender) ?></label>
								</td>
							</tr>
							<tr>
								<th scope="row">10</th>
								<td>Mobile</td>
								<td>
									<input type="tel" id="typeNumber" class="form-control" name="phone"  required value="<?php echo($phone) ?>"/>
								</td>
							</tr>
							<tr>
								<th scope="row">11</th>
								<td>Email</td>
								<td>
									<input type="email" id="typeEmail" class="form-control" required name="email" value="<?php echo($email) ?>"/>
								</td>
							</tr>
						</tbody>
					</table>
					<div class="text-center pb-3">
						
						<button type="submit" class="btn btn-success" name="save">Save</button>
						<button type="submit" name="logout" style="background-color: red;" class="btn btn-success" name="logout">Logout</button>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
		if(isset($_POST['save'])){

    $sql = "UPDATE `member` SET `MemName`='".$_POST["name"]."',`MemDOB`='".$_POST["dob"]."',`MemAddress`='".$_POST["add"]."',`MemDept`='".$_POST["dep"]."',`MemDesig`='".$_POST["des"]."',`MemAge`='".$_POST["age"]."',`MemNIC`='".$_POST["nic"]."',`MemGender`='".$_POST["gender"]."',`MemMobile`='".$_POST["tel"]."',`MemEmail`='".$_POST["mail"]."' WHERE `MemUName`='".$_SESSION["member"]."';";

    if ( $conn->query( $sql ) === TRUE ) {
		echo "<script> location.href='member-profile.php'; </script>";
	}else{
		echo"error";
	}
		}
	
        if ( isset( $_POST[ 'logout' ] ) ) {
          unset( $_SESSION );
          session_destroy();
          echo "<script> location.href='member-login-profile.php'; </script>";
        }
        ?>

		<!-- Footer -->
		<footer class="footer text-center text-white fixed-bottom">
			<div
				class="text-center p-0"
				style="background-color: rgba(0, 0, 0, 0.774)"
			>
				Made with ❤️ by HNDIT 2019 batch.
			</div>
		</footer>

		<!-- MDB -->
		<script
			type="text/javascript"
			src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/3.5.0/mdb.min.js"
		></script>
	</body>
</html>
