<?php

session_start();

//var_dump($_POST['submitText']);

$text = $_POST['submitText'];

$pdo = new PDO("mysql:host=localhost;dbname=marlin;","root","");

$sql = "SELECT * FROM task9_table WHERE submit_text = :submit_text";
$statement = $pdo->prepare($sql);
$statement->execute(['submit_text' => $text]);
$result = $statement->fetch(PDO::FETCH_ASSOC); 
//print_r($result);die;

if(!empty($result)){ echo 
	$message = "Введенная запись '".$result['submit_text']."' уже есть в таблице";
	$_SESSION['message'] = $message;
	header("location: ./task_10.php");
	exit;
}

$sql = "INSERT INTO task9_table (submit_text) VALUES (:submit_text)";
$statement = $pdo->prepare($sql);
$statement->execute(['submit_text' => $text]);

header("location: ./task_10.php");

?>