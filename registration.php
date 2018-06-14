<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Registration Portal </title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300">
</head>
<body>
	<header class="heading">
		<h1>REGISTRATION PAGE</h1>
	</header>
	<div>
		<img src="tt.svg" id="logo">
	</div>
	<div class="choices">
		<form action="upload.php" method="POST" name="registration" enctype="multipart/form-data">
			<input type="text" name="t_name" placeholder="Team Name" pattern="[A-Za-z0-9 ]+" required/>
			<input type="text" name="t_head" placeholder="Team Head" pattern="[A-Za-z.' ]+" required/>
			<input type="text" name="reg_no" placeholder="Registration Number" pattern="[0-9]{9}" required/>
			<input type="text" placeholder="Branch/Specialisation" name="branch" pattern="[A-Za-z\x26. ]+" required/>
			<input type="text" placeholder="Semester" name="sem" pattern="[1-9]" required/>
			<input type="text" placeholder="Institution" name="insti" pattern="[A-Za-z\x26. ]+" required/>
			<input type="text" placeholder="Phone Number" name="ph_no" pattern="[0-9]{10}" required/>
			<input type="email" placeholder="Email Id" name="em_id" required/>
			<input type="file" name="abstract_file" required/>

			<input type="submit" name="submit" value="Register" id="button"/>
			<?php
				if(isset($_SESSION['message']))
				{
					echo '<br/>' . $_SESSION['message'];
				}
				if (isset($_SESSION['uploadMessage'])) 
				{
					echo '<br/>' . $_SESSION['uploadMessage'];
				}
			?>
		</form>
	</div>
</body>
</html>