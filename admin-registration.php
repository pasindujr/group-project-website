<html lang="en">
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<title>ATI Kegalle - Admin</title>
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

	<body class="main-bg">
		
	<!-- Navbar -->
	<?php require_once "assets/navbar.php"; ?>
	<!-- Navbar --> 

		<div class="login-container text-center">
			<div>
				<h1 class="logo-badge"><span class="fas fa-user-cog"></span></h1>
			</div>
			<h3 class="text-whitesmoke">Admin Control</h3>
		</div>
		<div class="container">
			<form class="mb-3">
				<!-- 2 column grid layout with text inputs for the first and last names -->
				<div class="row mb-4">
					<div class="col">
						<div class="form-outline">
							<input type="text" id="form6Example1" class="form-control" />
							<label class="form-label" for="form6Example1">Admin name</label>
						</div>
					</div>
					
				</div>
				<!-- Username input -->
				<div class="form-outline mb-4">
					<input type="text" id="form6Example3" class="form-control" />
					<label class="form-label" for="form6Example3">Admin Username</label>
				</div>

				<!-- NIC input -->
				<div class="form-outline mb-4">
					<input type="number" id="form6Example6" class="form-control" />
					<label class="form-label" for="form6Example6">NIC</label>
				</div>

				<!-- Birthday input -->
				<div class="form-outline mb-4">
					<input type="text" id="form6Example5" class="form-control" />
					<label class="form-label" for="form6Example5">Birthday</label>
				</div>
				<!-- Age input -->
				<div class="form-outline mb-4">
					<input type="number" id="form6Example6" class="form-control" />
					<label class="form-label" for="form6Example6">Age</label>
				</div>
				<!-- Address input -->
				<div class="form-outline mb-4">
					<input type="text" id="form6Example5" class="form-control" />
					<label class="form-label" for="form6Example5">Address</label>
				</div>
				<!-- Gender select-->
				<div class="mb-4">
					<label class="form-label" for="form6Example5">Gender</label>
					<select>
						<option value="" disabled selected>Choose your option</option>
						<option value="1">Male</option>
						<option value="2">Female</option>
					</select>
				</div>

				
				<!-- Mobile input -->
				<div class="form-outline mb-4">
					<input type="number" id="form6Example6" class="form-control" />
					<label class="form-label" for="form6Example6">Mobile</label>
				</div>

				<!-- Email input -->
				<div class="form-outline mb-4">
					<input type="email" id="form6Example5" class="form-control" />
					<label class="form-label" for="form6Example5">Email</label>
				</div>

				<!-- Department select -->
				<div class="mb-4">
					<label class="form-label" for="form6Example5">Department</label>
					<select>
						<option value="" disabled selected>Choose your option</option>
						<option value="1">IT</option>
						<option value="2">Accounting</option>
						<option value="3">English</option>
						<option value="4">Project Management</option>
					</select>
				</div>

				<!-- Designation select -->
				<div class="mb-4">
					<label class="form-label" for="form6Example5">Designation</label>
					<select>
						<option value="" disabled selected>Choose your option</option>
						<option value="1">Director</option>
						<option value="2">Academic</option>
						<option value="3">Student</option>
						<option value="4">Non-academic</option>
					</select>
				</div>

				<!-- Password input -->
				<div class="form-outline mb-4">
					<input type="password" id="form6Example6" class="form-control" />
					<label class="form-label" for="form6Example6">Enter Password</label>
				</div>

				<!-- Password input -->
				<div class="form-outline mb-4">
					<input type="password" id="form6Example6" class="form-control" />
					<label class="form-label" for="form6Example6">Confirm Password</label>
				</div>
				<!-- Security Question 1 select -->
				<div class="mb-4">
					<label class="form-label" for="form6Example5">Security Question 1</label>
					<select>
						<option value="" disabled selected>Choose your Question</option>
						<option value="1">Question 1</option>
						<option value="2">Question 2</option>
						<option value="3">Question 3</option>
						<option value="4">Question 4</option>
					</select>
				</div>
				
				<!-- Security question 1 answer input -->
				<div class="form-outline mb-4">
					<input type="text" id="form6Example5" class="form-control" />
					<label class="form-label" for="form6Example5">Security Question 1 Answer</label>
				</div>

				<!-- Security Question 2 select -->
				<div class="mb-4">
					<label class="form-label" for="form6Example5">Security Question 2</label>
					<select>
						<option value="" disabled selected>Choose your Question</option>
						<option value="1">Question 1</option>
						<option value="2">Question 2</option>
						<option value="3">Question 3</option>
						<option value="4">Question 4</option>
					</select>
				</div>
				
				<!-- Security question 2 answer input -->
				<div class="form-outline mb-4">
					<input type="text" id="form6Example5" class="form-control" />
					<label class="form-label" for="form6Example5">Security Question 2 Answer</label>
				</div>

				<!-- Submit button -->
				<div class="container pb-2 ">
				<button type="submit" class="btn btn-primary btn-block mb-4">
					Create Account
				</button>
			</div>
			</form>
		</div>
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
