<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<title>ATI Kegalle - Create Profile</title>
	<link href="snackbar.css" rel="stylesheet"/>
<!-- Required bootstrap CSS --> 
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
	<iframe name="frm" style="display: none;"></iframe>
	<div id="snackbar">Incorrect Username/Password Plese recheck and enter again</div>
	<script type="text/javascript" src="snackbar.js"></script>
	
<!-- Navbar -->
<?php require_once "assets/navbar.php"; ?>
<!-- Navbar --> 

<br />

<!-- Content-->
<div class="container">
  <h2 style="text-align: center">Create Profile</h2>
</div>
<div class="container">
	<script>
		function validte(){
			let p1 = document.forms["mform"]["password"].value;
			let p2 = document.forms["mform"]["password2"].value;
			let q1 = document.forms["mform"]["q1"].value;
			let q2 = document.forms["mform"]["q2"].value;
  			if (p1 == p2) {
    			//return true;
			}else{
				showmessage("Password missmatch");
				return false;
			}
			if(q1==q2){
			   	showmessage("Same sequrity quections selected");
				return false;
			   }
		}
	</script>
  <form class="mb-3" method="post" name="mform" onsubmit="return validte()" action="addmember.php">
    <!-- 2 column grid layout with text inputs for the first and last names -->

        <div class="form-outline mb-4">
          <input type="text" id="form6Example1" class="form-control" name="name" required/>
          <label class="form-label" for="form6Example1">Name</label>
        </div>
      
    <!-- Username input -->
    <div class="form-outline mb-4">
      <input type="text" id="form6Example3" class="form-control" required name="uname"/>
      <label class="form-label" for="form6Example3">User Name</label>
    </div>
    
    <!-- NIC input -->
    <div class="form-outline mb-4">
      <input type="text" id="form6Example6" class="form-control" name="nic"  required/>
      <label class="form-label" for="form6Example6">NIC</label>
    </div>
    
    <!-- Birthday input -->
    <div class="form-outline mb-4">
      <input type="date" id="form6Example5" class="form-control" name="dob" required/>
      <label class="form-label" for="form6Example5">Birthday</label>
    </div>
    <!-- Age input -->
    <div class="form-outline mb-4">
      <input type="number" id="form6Example6" class="form-control" name="age" required/>
      <label class="form-label" for="form6Example6">Age</label>
    </div>
    <!-- Address input -->
    <div class="form-outline mb-4">
      <input type="text" id="form6Example5" class="form-control" name="add" required/>
      <label class="form-label" for="form6Example5">Address</label>
    </div>
    <!-- Gender select-->
    <div class="mb-4">
      <label class="form-label" for="form6Example5">Gender</label>
      <select required name="gender">
        <option value="" disabled selected>Choose your option</option>
        <option value="Male">Male</option>
        <option value="Female">Female</option>
      </select>
    </div>
    
    <!-- Mobile input -->
    <div class="form-outline mb-4">
      <input type="tel" id="form6Example6" class="form-control" name="phone" required/>
      <label class="form-label" for="form6Example6">Mobile</label>
    </div>
    
    <!-- Email input -->
    <div class="form-outline mb-4">
      <input type="email" id="form6Example5" class="form-control" name="email"  required/>
      <label class="form-label" for="form6Example5">Email</label>
    </div>
    
    <!-- Department select -->
    <div class="mb-4">
      <label class="form-label" for="form6Example5">Department</label>
      <select name="dep" required>
        <option value="" disabled selected>Choose your option</option>
        <option value="IT">IT</option>
        <option value="Accounting">Accounting</option>
        <option value="English">English</option>
        <option value="Project Management">Project Management</option>
      </select>
    </div>
    
    <!-- Designation select -->
    <div class="mb-4">
      <label class="form-label" for="form6Example5">Designation</label>
      <select required name="des">
        <option value="" disabled selected>Choose your option</option>
        <option value="Director">Director</option>
        <option value="Academic">Academic</option>
        <option value="Student">Student</option>
        <option value="Non-academic">Non-academic</option>
      </select>
    </div>
    
    <!-- Password input -->
    <div class="form-outline mb-4">
      <input type="password" id="form6Example6" class="form-control" required name="password"/>
      <label class="form-label" for="form6Example6" >Enter Password</label>
    </div>
    
    <!-- Password input -->
    <div class="form-outline mb-4">
      <input type="password" id="form6Example6" class="form-control" name="password2" required/>
      <label class="form-label" for="form6Example6">Confirm Password</label>
    </div>
    <!-- Security Question 1 select -->
    <div class="mb-4">
      <label class="form-label" for="form6Example5">Security Question 1</label>
      <select required name="q1">
        <option value="" disabled selected>Choose your Question</option>
        <option value="What was your first School?">What was your first School?</option>
        <option value="What is the city you were born?">What is the city you were born?</option>
        <option value="what is your grand mother first name?">what is your grand mother first name?</option>
        <option value="what are the 4 last numbers of your Driving License?">what are the 4 last numbers of your Driving License?</option>
        <option value="In what town did you meet your life partner?">In what town did you meet your life partner?</option>
      </select>
    </div>
    
    <!-- Security question 1 answer input -->
    <div class="form-outline mb-4">
      <input type="text" id="form6Example5" class="form-control" required name="a1"/>
      <label class="form-label" for="form6Example5">Security Question 1 Answer</label>
    </div>
    
    <!-- Security Question 2 select -->
    <div class="mb-4">
      <label class="form-label" for="form6Example5">Security Question 2</label>
      <select required name="q2">
        <option value="" disabled selected>Choose your Question</option>
        <option value="What was your first School?">What was your first School?</option>
        <option value="What is the city you were born?">What is the city you were born?</option>
        <option value="what is your grand mother first name?">what is your grand mother first name?</option>
        <option value="what are the 4 last numbers of your Driving License?">what are the 4 last numbers of your Driving License?</option>
        <option value="In what town did you meet your life partner?">In what town did you meet your life partner?</option>
      </select>
    </div>
    
    <!-- Security question 2 answer input -->
    <div class="form-outline mb-4">
      <input type="text" id="form6Example5" class="form-control" required name="a2"/>
      <label class="form-label" for="form6Example5">Security Question 2 Answer</label>
    </div>
    
    <!-- Submit button -->
    <div class="container pb-2 ">
      <button type="submit" class="btn btn-primary btn-block mb-4" name="submit"> Create Account </button>
    </div>
  </form>
  
	
	<?php
	if ( isset( $_GET[ 'updatestatus' ] ) ) {
		if ( $_GET[ 'updatestatus' ] == "success" ) {
			print( '<script type="text/javascript">
			showmessage("Recode successfully Created");
			</script>' );
		}
		if ( $_GET[ 'updatestatus' ] == "fail" ) {
			print( '<script type="text/javascript">
			showmessage("Recode create fail '.$_GET[ 'error' ].'");
			</script>' );
		}

	}
	?>
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
