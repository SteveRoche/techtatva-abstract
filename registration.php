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
	<div class="page-grid-container">
		<header id="header" class="page-grid-item">
			<h1 class="heading">Registration Page</h1>
		</header>
		<div id="logo" class="page-grid-item"></div>
		<div class="indicator fa fa-down-arrow"></div>
		<div id="form-container" class="page-grid-item">
			<form action="upload.php" method="POST" name="registration" enctype="multipart/form-data">
				<input id="input-t_name" type="text" name="t_name" value="<?php if(isset($_SESSION['t_name'])) { echo @$_SESSION['t_name'];} ?>" placeholder="Team Name" pattern="[A-Za-z0-9 ]+" required/>
				<input id="input-t_head" type="text" name="t_head" value="<?php if(isset($_SESSION['t_head'])) { echo @$_SESSION['t_head'];} ?>" placeholder="Team Head" pattern="[A-Za-z.' ]+" required/>
				<input id="input-reg_no" type="text" name="reg_no" value="<?php if(isset($_SESSION['reg_no'])) { echo @$_SESSION['reg_no'];} ?>" placeholder="Registration Number" pattern="[0-9]{9}" required/>
				<input id="input-branch" type="text" value="<?php if(isset($_SESSION['branch'])) { echo @$_SESSION['branch'];} ?>" placeholder="Branch/Specialisation" name="branch" pattern="[A-Za-z\x26. ]+" required/>
				<input id="input-sem" type="text" name="sem" value="<?php if(isset($_SESSION['sem'])) { echo @$_SESSION['sem'];} ?>" placeholder="Semester" pattern="[1-9]" required/>
				<input id="input-insti" type="text" name="insti" value="<?php if(isset($_SESSION['insti'])) { echo @$_SESSION['insti'];} ?>" placeholder="Institution" pattern="[A-Za-z\x26. ]+" required/>
				<input id="input-ph_no" type="text" name="ph_no" value="<?php if(isset($_SESSION['ph_no'])) { echo @$_SESSION['ph_no'];} ?>" placeholder="Phone Number" pattern="[0-9]{10}" required/>
				<input id="input-em_id" type="email" name="em_id" value="<?php if(isset($_SESSION['em_id'])) { echo @$_SESSION['em_id'];} ?>" placeholder="Email Id" required/>
				<input id="input-abstract_file" type="file" name="abstract_file" required/>

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
	</div>
</body>
</html>