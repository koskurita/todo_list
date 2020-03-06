<?php

//add_task.php

include('database_connection.php');

//if task_name is true, then execute code
if($_POST["task_name"]){
	$data = array( 
			':user_id' => $_SESSION['user_id'],
			//trim so user cannot manipulate our data
			':task_details' => trim($_POST["task_name"]),
			':task_status' => 'no'
	);

	$query = "
	INSERT INTO task_list
	(user_id, task_details, task_status) 
	VALUES(:user_id, :task_details, :task_status)
	";


	//run code
	$statement = $connect->prepare($query);

	//if code runs successfully
	if($statement->execute($data))
	{
		//get last inserted id
		$task_list_id = $connect->lastInsertId();

		echo '<a href="#" class="list-group-item" id="list-group-item-'.$task_list_id.'" data-id="'.$task_list_id.'">'.$_POST["task_name"].' <span class="badge" data-id="'.$task_list_id.'">X</span></a>';
	}

}

?>
