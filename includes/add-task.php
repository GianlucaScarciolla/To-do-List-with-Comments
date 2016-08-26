<?php 
	$task 		= strip_tags( $_POST['task'] );
	$comment	= strip_tags( $_POST['comment'] );
	$date 		= date('Y-m-d');
	$time 		= date('H:i:s');
	echo $task.$comment;
	require("connect.php");

	mysqli_query($conn, "INSERT INTO tasks VALUES ('', '$task', '$date', '$time', '$comment')");

	$query = mysqli_query($conn, "SELECT * FROM tasks WHERE task='$task' and date='$date' and time='$time' and comment='$comment'");

	while( $row = mysqli_fetch_assoc($query) ){
		$task_id = $row['id'];
		$task_name = $row['task'];
		$comment_text = $row['comment'];
	}

	mysqli_close($conn);

	echo '<li><span>'.$task_name.'</span><img id="'.$task_id.'" class="delete-button" width="10px" src="images/close.svg" /><span>'.$comment_text.'</span></li>';
?>