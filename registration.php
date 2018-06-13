<?php
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title> Registration Portal </title>
</head>
<body>
	<div>
		<form action="upload.php" method="POST" name="registration" enctype="multipart/form-data">
			<div>
				<input type="text" name="t_name" placeholder="Team Name" pattern="[A-Za-z0-9 ]+" required/>
				<input type="text" name="t_head" placeholder="Team Head" pattern="[A-Za-z.' ]+" required/>
				<input type="text" name="reg_no" placeholder="Registration Number" pattern="[0-9]{9}" required/>
			</div>

			<div>
				<input type="text" placeholder="Branch/Specialisation" name="branch" pattern="[A-Za-z\x26. ]+" required/>
				<input type="text" placeholder="Semester" name="sem" pattern="[1-9]" required/>
				<input type="text" placeholder="Institution" name="insti" pattern="[A-Za-z\x26. ]+" required/>
			</div>

			<div>
				<input type="text" placeholder="Phone Number" name="ph_no" pattern="[0-9]{10}" required/>
				<input type="email" placeholder="Email Id" name="em_id" required/>
			</div>

			<div>
				<input type="file" name="abstract_file" id="abstract_file" required/>
			</div>
			<input type="submit" name="submit" value="Register"/>
			<?php
				if(isset($_SESSION['message'])) {
					echo '<br/>' . $_SESSION['message'];
				}

				if (isset($_SESSION['uploadMessage'])) {
					echo '<br/>' . $_SESSION['uploadMessage'];
				}
			?>
		</form>
	</div>
</body>
</html>