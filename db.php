<?php
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

	$stmtAddTeam = $pdo->prepare(
		"INSERT INTO abstract_teams(team_name, team_head, reg_no, branch, sem, institution, phone_no, email, file_path) VALUES (?,?,?,?,?,?,?,?,?);"
	);

	$team_name="";
	$team_head="";
	$reg_no="";
	$branch="";
	$sem="";
	$institution="";
	$phone_no="";
	$email="";
	if(isset($_POST['submit']))
	{
		if(isset($_POST['abstract_file']))
		{
			header("Location: upload.php");
		}
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
			//code here
		}
		else
		{
			if(empty($team_head))
			{
				$error_message="Team head required";
			}
			elseif (empty($team_name)) 
			{
				$error_message="Team name required";
			}
			elseif (empty($reg_no))
			{
				$error_message="registeration number required";
			}
			elseif (empty($branch))
			{
				$error_message="Branch/Specialisation required";
			}
			elseif (empty($sem))
			{
				$error_message="Semester required";
			}
			elseif (empty($institution))
			{
				$error_message="Institution required";
			}
			elseif (empty($phone_no))
			{
				$error_message="Phone number required";
			}
			elseif (empty($email))
			{
				$error_message="Email required";
			}
			//got to kn which is missing
			
			$_SESSION['error_message']=$error_message;
			header("Location: registeration.php")
		}
	}

	
?>