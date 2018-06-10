<!DOCTYPE html>
<html>
<head>
	<title> Registration Portal </title>
</head>
<body>
	<div>
		<form action="upload.php" method="POST" name="registration">
			<div>
				<input type="text" name="t_name" placeholder="Team Name"/>
				<input type="text" name="t_head" placeholder="Team Head"/>
				<input type="text" name="reg_no" placeholder="Registration Number"/>
			</div>

			<div>
				<input type="text" placeholder="Branch/Specialisation" name="branch"/>
				<input type="text" placeholder="Semester" name="sem"/>
				<input type="text" placeholder="Institution" name="insti"/>
			</div>

			<div>
				<input type="text" placeholder="Phone Number" name="ph_no"/>
				<input type="text" placeholder="Email Id" name="em_id"/>
			</div>

			<div>
				<input type="file" name="abstract_file"/>
			</div>

			<input type="submit" name="submit" value="Register"/>
		</form>
	</div>
</body>
</html>