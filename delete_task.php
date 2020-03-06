<?php

//delete_task.php

include('database_connection.php');

if($_POST["task_list_id"])
{
	//save id into data
	$data = array(
		':task_list_id'  => $_POST['task_list_id']
	);

	//prep the sql code to run
	$query = "
	DELETE FROM task_list  
	WHERE task_list_id = :task_list_id
	";

	//run the oode
	$statement = $connect->prepare($query);

	if($statement->execute($data))
	{
		echo 'done';
	}
}



?>