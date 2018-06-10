<!DOCTYPE html>
<html>
<head>
	<title> Registration Portal </title>
</head>
<body>
	<div>
		<form action="upload.php" method="POST" name="registration">
			<div>
				<input type="text" name="t_name" placeholder="Team Name" required/>
				<input type="text" name="t_head" placeholder="Team Head" required/>
				<input type="text" name="reg_no" placeholder="Registration Number" required/>
			</div>

			<div>
				<input type="text" placeholder="Branch/Specialisation" name="branch" required/>
				<input type="text" placeholder="Semester" name="sem" required/>
				<input type="text" placeholder="Institution" name="insti" required/>
			</div>

			<div>
				<input type="text" placeholder="Phone Number" name="ph_no" required/>
				<input type="text" placeholder="Email Id" name="em_id" required/>
			</div>

			<div>
				<input type="file" name="abstract_file" required/>
			</div>

			<input type="submit" name="submit" value="Register"/>
		</form>
	</div>
</body>
</html>