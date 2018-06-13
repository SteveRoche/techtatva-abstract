<?php
	
	session_start();
	

	$dbHost = 'localhost';
	$dbName = 'abstract';
	$dbUser = 'root';
	$dbPassword = '';
	$charset = 'utf8mb4';

	$dsn = "mysql:host=$dbHost;dbname=$dbName;charset=$charset";

	$opt = [
		PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
		PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
		PDO::ATTR_EMULATE_PREPARES => false,
	];

	$pdo = new PDO($dsn, $dbUser, $dbPassword, $opt);

	
	);
	
	//initialisation
	$team_name="";
	$team_head="";
	$reg_no="";
	$branch="";
	$sem="";
	$institution="";
	$phone_no="";
	$email="";
	$resStr="";
	if(isset($_POST['submit']))
	{
		//if there is an abstract file
		if(isset($_POST['abstract_file']))
		{
			header("Location: upload.php");
			//want the code to start from here not whole after going to upload.php
		}
		//storing the data
		$resStr=$_SESSION['resStr']
		$team_head=$_POST['t_head'];
		$team_name=$_POST['t_name'];
		$reg_no=$_POST['reg_no'];
		$branch=$_POST['branch'];
		$sem=$_POST['sem'];
		$institution=$_POST['insti'];
		$phone_no=$_POST['ph_noo'];
		$email=$_POST['em_id'];

		//if all details are there
		if(isset($team_name,$team_head,$reg_no,$branch,$sem,$institution,$phone_no,$email))
		{
			//add the details to the database
			$stmtAddTeam = $pdo->execute(
		"INSERT INTO abstract_teams(team_name, team_head, reg_no, branch, sem, institution, phone_no, email, file_path) VALUES ($team_name,$team_head,$reg_no,$branch,$sem,$institution,$phone_no,$email);"
		}

		//to check whats not given by the user
		else
		{
			if(empty($team_head))
			{
				$message="Team head required";
			}
			elseif (empty($team_name)) 
			{
				$message="Team name required";
			}
			elseif (empty($reg_no))
			{
				$message="registeration number required";
			}
			elseif (empty($branch))
			{
				$message="Branch/Specialisation required";
			}
			elseif (empty($sem))
			{
				$message="Semester required";
			}
			elseif (empty($institution))
			{
				$message="Institution required";
			}
			elseif (empty($phone_no))
			{
				$message="Phone number required";
			}
			elseif (empty($email))
			{
				$message="Email required";
			}
			//got to kn which is missing
			
			$_SESSION['message1']=$message1;
			$_SESSION['message2']=$resStr;
			header("Location: registration.php")
		}
	}

	
?>