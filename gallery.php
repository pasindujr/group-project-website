<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
	<style>
		.rws{
			padding: 15px;
			width: 30vw;
		}
	</style>
<title>ATI Kegalle - Gallery</title>
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
<!-- Navbar -->
<?php require_once "assets/navbar.php"; ?>
<!-- Navbar -->  
<br />

<!-- Gallery -->
<div class="container">
  <table>
    <?php
    $dirname = "assets\\";
    $images = glob( $dirname . "*.{jpg,png,gif,jpeg}", GLOB_BRACE );
	  
	  for($x = 0; $x < count($images); $x++){
		  echo '<tr>';
		for($i=0;$i<3;$i++){
			echo '<td class="rws"><img src="' . $images[$x] . '" class="w-100 shadow-1-strong rounded mb-4" /></td>';
			if($x < count($images)-1){
				$x++;
			}else{
				break;
			}
			}
		echo '</tr>';
	  }
	  
//    foreach ( $images as $image ) {
//      
//		echo '<tr>';
//		for($i=0;$i<3;$i++){
//			echo '<td><img src="' . $images[2] . '" class="w-100 shadow-1-strong rounded mb-4" /></td>';
//			}
//		echo '</tr>';
//    }
    ?>
  </table>
</div>
<!-- Gallery --> 

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
