<?php 
	require("connect.php");

	$task 		= strip_tags( $_POST['task'] );
	$comment	= strip_tags( $_POST['comment'] );
	$date 		= date('Y-m-d');
	$time 		= date('H:i:s');

	// Prepared insert statement
	$sql = "INSERT INTO tasks (task,date,time,comment) VALUES (?,?,?,?)";
	$statement = mysqli_stmt_init($conn);

	if(mysqli_stmt_prepare($statement, $sql)) {
		mysqli_stmt_bind_param($statement, "ssss", $task, $date, $time, $comment);
		mysqli_stmt_execute($statement);
		mysqli_stmt_close($statement);
	} else {
		mysqli_close($conn);
		die("MySQLi: Statement preparation failed.");
	}
	
	mysqli_close($conn);
?>
