<?php 
/* --------------------------------------------------
 * FILE DESCRIPTION
 * --------------------------------------------------
 * 
 */

isset($_GET['confirm']) OR die('If you really want to <strong>RESTART THE SYSTEM DATABASE</strong> add "?confirm=y" to URL');

if($_GET['confirm'] == 'y'){
	$conn = mysqli_connect('localhost', 'root', '');
	if($conn->connect_error)
		die("CONNECTION ERRO #".$conn->connect_errno." - ".$conn->connect_error);
	echo 'Connection OK<br>';
	$sql = file_get_contents('database.sql');
	$sql = $conn->prepare($sql);
	var_dump($sql);
	#$conn->query($sql);
}

?>