<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>ATI Kegalle - Admin Panel</title>
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
		<div class="container">
			<script>
						function filter(obj,row) {
						  // Declare variables
						  var input, filter, table, tr, td, i, txtValue;
						  //input = document.getElementById("myInput");
						  input = document.getElementById(obj);
						  filter = input.value.toUpperCase();
						  table = document.getElementById("member");
						  tr = table.getElementsByTagName("tr");
						  // Loop through all table rows, and hide those who don't match the search query
						  for (i = 0; i < tr.length; i++) {
							td = tr[i].getElementsByTagName("td")[row];
							if (td) {
							  txtValue = td.textContent || td.innerText;
							  if (txtValue.toUpperCase().indexOf(filter) > -1) {
								tr[i].style.display = "";
							  } else {
								tr[i].style.display = "none";
							  }
							}
						  }
						}
		</script>
			<!-- Search Section -->
			<div class="row mb-4">
				<div class="col">
					<div class="input-group mb-3">
						<input
							type="date"
							class="form-control"
							placeholder="First Date"
							aria-label="First Date"
							aria-describedby="button-addon2"
						/>
						
					</div>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<input
							type="date"
							class="form-control"
							placeholder="Last Date"
							aria-label="Last Date"
							aria-describedby="button-addon2"
						/>
						<button
							class="btn btn-outline-primary"
							type="button"
							id="button-addon2"
							data-mdb-ripple-color="dark"
						>
							<i class="fas fa-search"></i>
						</button>
					</div>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<input type="text" class="form-control" placeholder="Name or NIC" aria-label="Name or NIC" aria-describedby="button-addon2" id="name" onKeyUp="filter('name',0)" />
						
					</div>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<input
							type="text"
							class="form-control"
							placeholder="Department"
							aria-label="Department"
							aria-describedby="button-addon2"
							id="dep"
							onKeyUp="filter('dep',3)" 
						/>
						
					</div>
				</div>
				<div class="col">
					<div class="input-group mb-3">
						<input
							type="text"
							class="form-control"
							placeholder="Designation"
							aria-label="Designation"
							aria-describedby="button-addon2"
							  id="des"
							 onKeyUp="filter('des',4)"
						/>
						
					</div>
				</div>
			</div>
		</div>

		<!--Tables-->
		
		<div>
			<h5 class="text-center">Members</h5>
			<table class="table mb-5" id="member">
				<thead>
					<tr>
						<th scope="col">Name</th>
						<th scope="col">Date of Birth</th>
						<th scope="col">Address</th>
						<th scope="col">Department</th>
						<th scope="col">Designation</th>
						<th scope="col">Age</th>
						<th scope="col">NIC</th>
						<th scope="col">Gender</th>
						<th scope="col">Mobile</th>
						<th scope="col">Date</th>
						<th scope="col">Time In</th>
						<th scope="col">Time Out</th>
					</tr>
				</thead>
				<tbody>
					<?php
					require 'conn.php';

					$sql = "SELECT `member`.`MemName` AS `Name` , `member`.`MemDOB` AS `Date of Birth` , `member`.`MemAddress` AS `Address` , `member`.`MemDept` AS `Department` , `member`.`MemDesig` AS `Designation` , TIMESTAMPDIFF(YEAR, `MemDOB`, CURDATE()) AS `Age` , `member`.`MemNIC` AS `NIC` , `member`.`MemGender` AS `Gender` , `member`.`MemMobile` AS `Mobile` , `member_log`.`Date` , `member_log`.`TimeIn` , `member_log`.`TimeOut` FROM `tkdb`.`member_log` INNER JOIN `tkdb`.`member` ON (`member_log`.`MemUName` = `member`.`MemUName`)";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					  // output data of each row
					  while($row = $result->fetch_assoc()) {
						  
						echo "
							<tr>
						<td scope='row'>". $row["Name"]."</td>
						<td>". $row["Date of Birth"]."</td>
						<td>". $row["Address"]."</td>
						<td>". $row["Department"]."</td>
						<td>". $row["Designation"]."</td>
						<td>". $row["Age"]."</td>
						<td>". $row["NIC"]."</td>
						<td>". $row["Gender"]."</td>
						<td>". $row["Mobile"]."</td>
						<td>". $row["Date"]."</td>
						<td>". $row["TimeIn"]."</td>
						<td>". $row["TimeOut"]."</td>
					</tr>";
					  }
					} else {
					  echo "0 results";
					}
					$conn->close();
					?>

					
				</tbody>
			</table>
		</div>

		<h5 class="text-center">Visitors</h5>
		<table class="table mb3" id="visitor">
			<thead>
				<tr>
					<th scope="col">Name</th>
					<th scope="col">NIC</th>
					<th scope="col">Date of Birth</th>
					<th scope="col">Age</th>
					<th scope="col">Address</th>
					<th scope="col">Gender</th>
					<th scope="col">Phone</th>
					<th scope="col">Reason</th>
					<th scope="col">Date</th>
					<th scope="col">Time In</th>
					<th scope="col">Time Out</th>
				</tr>
			</thead>
			<tbody>
				<?php
					require 'conn.php';

					$sql = "SELECT `visitor`.`ViName` AS `Name` , `visitor`.`ViNIC` AS `NIC` , `visitor`.`ViDob` AS `Date of Birth` , TIMESTAMPDIFF(YEAR, `ViDob`, CURDATE()) AS `Age` , `visitor`.`ViAddress` AS `Address` , `visitor`.`ViGender` AS `Gender` , `visitor`.`ViMobile` AS `Phone` , `visitor`.`ViReason` AS `Reason` , `visitor_log`.`Date` , `visitor_log`.`TimeIn` , `visitor_log`.`TimeOut` FROM `tkdb`.`visitor_log` INNER JOIN `tkdb`.`visitor` ON (`visitor_log`.`ViNIC` = `visitor`.`ViNIC`);";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					  // output data of each row
					  while($row = $result->fetch_assoc()) {
						  
						echo "
							<tr>
						<td scope='row'>". $row["Name"]."</td>
						<td>". $row["NIC"]."</td>
						<td>". $row["Date of Birth"]."</td>
						<td>". $row["Age"]."</td>
						<td>". $row["Address"]."</td>
						<td>". $row["Gender"]."</td>
						<td>". $row["Phone"]."</td>
						<td>". $row["Reason"]."</td>
						<td>". $row["Date"]."</td>
						<td>". $row["TimeIn"]."</td>
						<td>". $row["TimeOut"]."</td>
					</tr>";
					  }
					} else {
					  echo "0 results";
					}
					$conn->close();
					?>
				
			</tbody>
		</table>

		<div class="text-center mb-5">
			<form method="post" action="reports.php">
			<button type="submit" class="btn btn-danger" name="logout">Log out</button>
			<a href="admin-edit.php"><button  type="button" class="btn btn-primary">Edit Content</button></a>
			</form>
			 <?php
        if ( isset( $_POST[ 'logout' ] ) ) {
          unset( $_SESSION );
          session_destroy();
          echo "<script> location.href='admin-login.php'; </script>";
        }
        ?>
		</div>

		<!--Content-->

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
