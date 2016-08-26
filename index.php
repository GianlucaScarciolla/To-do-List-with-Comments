<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>To-do list with Comments</title>
<link rel="stylesheet" href="style.css">

</head>
<body>
	<div class="wrap">    
  
		<div class="task-list">
			<ul>

			<?php 
				require("includes/connect.php");

				$sqlbefehl = "SELECT * FROM tasks ORDER BY date ASC, time ASC";
				$query = mysqli_query($conn, $sqlbefehl) or die(mysql_error());
				$numrows = mysqli_num_rows($query);

				if($numrows>0){
					while( $row = mysqli_fetch_assoc( $query ) ){

						$task_id = $row['id'];
						$task_name = $row['task'];
						$comment_text = $row['comment'];

						echo '<li>
								<span>'.$task_name.'</span>
								<img id="'.$task_id.'" class="delete-button" width="10px" src="images/close.svg" />
								<span class="comment_box_style">'.$comment_text.'</span>
							  </li>
							  ';
					}
				}

			?>
				
			</ul>
		</div>
        <br>
		<form class="add-new-task" autocomplete="off">
			<input type="text" name="new-task" maxlength="20" placeholder="Add a new task... max. 20" />
            <br>
            <input type="text" name="new-comment" maxlength="20" placeholder="Add a new Comment... max. 20" />
            <br>
              <input id="send_box" type="submit" value="Submit">
		</form>
        <br>
        <span><p id="website_title">Copyright by Gianluca Scarciolla 2016 | To-do List with comments</p></span>
        <br>
	</div><!-- #wrap -->
</body>


	<!-- JavaScript -->
	<script src="http://code.jquery.com/jquery-latest.min.js"></script>
	<script>
		
		add_task(); // call add funktion
		delete_task(); // Call delete funktion

		function add_task() {

			$('.add-new-task').submit(function(){

				var new_task = $('.add-new-task input[name=new-task]').val();
				var new_comment = $('.add-new-task input[name=new-comment]').val();

				if(new_task != ''){

					$.post('includes/add-task.php', { task: new_task, comment: new_comment }, function( data ) {

						$('.add-new-task input[name=new-task]').val('');
						$('.add-new-task input[name=new-comment]').val('');
						
						
						
						location.reload();

						delete_task();
					});
									
				}

				return false; // Leert, damit der wert nicht zweimal gesendet wird
			});
						
			
		}
		
		
		


		function delete_task() {

			$('.delete-button').click(function(){

				var current_element = $(this);

				var id = $(this).attr('id');

				$.post('includes/delete-task.php', { task_id: id }, function() {

					current_element.parent().fadeOut("fast", function() { $(this).remove(); });
				});
			});
		}
		



</script>


	</script>
<body>
</body>
</html>