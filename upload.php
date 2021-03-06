<?php
	session_start();

	$dbHost = 'localhost';
	$dbName = 'abstract';
	$dbUser = 'root';
	$dbPassword = '';
	$charset = 'utf8mb4';

	$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$charset";

	$opt =
	[
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES => false,
	];

	$pdo = new PDO($dsn, $dbUser, $dbPassword, $opt);
	$stmtAddTeam = $pdo->prepare(
		"INSERT INTO abstract_teams(team_name, team_head, reg_no, branch, sem, institution, phone_no, email, file_path) VALUES (?,?,?,?,?,?,?,?,?)"
	);

	//after every submit everything shud become empty
	unset($team_name, $team_head, $reg_no, $branch, $sem, $institution, $phone_no, $email);
	
	if(isset($_POST['submit']))
	{

		$formOk = false;
		$uploadOk = false;

		$message = '';
		$uploadMessage = 'uploadMessage';

		$team_name = $_POST['t_name'];
		$team_head = $_POST['t_head'];
		$reg_no = $_POST['reg_no'];

		$branch = $_POST['branch'];
		$sem = $_POST['sem'];
		$institution = $_POST['insti'];

		$phone_no = $_POST['ph_no'];
		$email = $_POST['em_id'];
		$message='';
		$uploadMessage='';
		//for every missing part
		if (empty($team_name)) 
		{
			$message .= "Team name,";
		} 
		if (empty($team_head)) 
		{
			$message .= "Team head, ";
		} 
		if (empty($reg_no)) 
		{
			$message .= "Registeration number, ";
		} 
		if (empty($branch)) 
		{
			$message .= "Branch/Specialisation, ";
		} 
		if (empty($sem)) 
		{
			$message .= "Semester, ";
		} 
		if (empty($institution))
		{
			$message .= "Institution, ";
		} 
		if (empty($phone_no)) 
		{
			$message .= "Phone number, ";
		} 
		if (empty($email)) 
		{
			$message .= "Email, ";
		} 
		//if everything is there
		if(isset($team_name, $team_head, $reg_no, $branch, $sem, $institution, $phone_no, $email))
		{
			$formOk = true;
		}
		else
		{
			//keep whatever the user has already inputed
			//if something is null it will remain null

			$_SESSION['t_name'] = $team_name;
			$_SESSION['t_head'] = $team_head;
			$_SESSION['reg_no'] = $reg_no;
			$_SESSION['branch'] = $branch;
			$_SESSION['sem'] = $sem;
			$_SESSION['insti'] = $institution;
			$_SESSION['ph_no'] = $phone_no;
			$_SESSION['em_id'] = $email;
		}	
		if($message!='')
		{
			//need to remove a space and ,
			
			$message = substr($message, 0, strlen($message)-2);
			$message .= " required";
		}

		// File upload
		if($formOk && isset($_FILES['abstract_file'])) 
		{
			$uploadDir = 'uploads/';
			
			$errCode = $_FILES['abstract_file']['error'];
			$uploadFilePath = $uploadDir . basename($_FILES['abstract_file']['name']);
			if ($errCode != UPLOAD_ERR_OK && $errCode != UPLOAD_ERR_FORM_SIZE && $errCode != UPLOAD_ERR_INI_SIZE) 
			{
				$uploadMessage = "Failed to upload file.";
			} 
			elseif ($errCode == UPLOAD_ERR_INI_SIZE || $errCode == UPLOAD_ERR_FORM_SIZE || $_FILES['abstract_file']['size'] > (5 * 1024 * 1024)) 
			{
				$uploadMessage = "File too large";
			}
			elseif (strtolower(pathinfo($uploadFilePath, PATHINFO_EXTENSION)) != 'pdf') 
			{
				$uploadMessage = "Not a pdf";
			}
			elseif (file_exists($uploadFilePath)) 
			{
				$uploadMessage = "File already exists";
			}
			elseif (!move_uploaded_file($_FILES['abstract_file']['tmp_name'], $uploadFilePath)) 
			{
				$uploadMessage = "Failed to upload file";
			}
			else 
			{
				$uploadOk = true;
				$uploadMessage = 'Upload is Ok';
			}
		}

		if ($formOk && $uploadOk) 
		{
			$stmtAddTeam->execute([$team_name, $team_head, $reg_no, $branch, $sem, $institution, $phone_no, $email, $uploadFilePath]);
			$message = "Registered successfully";
			//session_destroy();
		}
			
		//no matter the messages should be shown
		$_SESSION['message'] = $message;
		$_SESSION['upload_message'] = $uploadMessage;
		header("Location: registration.php");
	}
	else
	{
		header("Location: registration.php");
	}
?>