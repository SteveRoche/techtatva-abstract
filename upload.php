<?php
	$uploadDir = 'uploads/';
	
	$uploadOk = true;

	// Did file upload successfully?
	if(isset($_POST['submit'])) 
	{
		$errCode = $_FILES['abstract']['error'];
		if ($errCode != UPLOAD_ERR_OK && $errCode != UPLOAD_ERR_FORM_SIZE && $errCode != UPLOAD_ERR_INI_SIZE) 
		{
			$resStr= "Failed to upload file.";
			$uploadOk = false;
		}
	}
	else 
	{
		header("Location: index.php");
	}

	// Is file within allowed size?
	if($uploadOk) 
	{
		if ($errCode == UPLOAD_ERR_INI_SIZE || $errCode == UPLOAD_ERR_FORM_SIZE || $_FILES['abstract']['size'] > (5 * 1024 * 1024)) 
		{
			$resStr = "File too large <br/>";
			$uploadOk = false;
		}

		// Is file a pdf?
		$uploadFilePath = $uploadDir . basename($_FILES['abstract']['name']);
		if (strtolower(pathinfo($uploadFilePath, PATHINFO_EXTENSION)) != 'pdf') 
		{
			$resStr = "Not a pdf <br/>";
			$uploadOk = false;
		}

		// Does file exist?
		if($uploadOk) 
		{
			if (file_exists($uploadFilePath)) 
			{
			$resStr = "File already exists <br/>";
			$uploadOk = false;
		}

		// Move file to server
		if(move_uploaded_file($_FILES['abstract']['tmp_name'], $uploadFilePath)) 
		{
			$resStr = "Uploaded file successfully <br/>";
			$uploadOk= true;
		} 
		else 
		{
			$resStr = "Failed to upload file <br/>";
			$uploadOk = false;
		}
	}

	$_SESSION['resStr']=$resStr;
	$_SESSION['file']=$uploadOk;
	//dont want the whole code to run again
	//i want to start it after if(isset($_POST['abstract_file']))
	header("Location: db.php");
?>