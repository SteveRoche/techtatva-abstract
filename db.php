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
?>