<?php
//get the index

try {
	//code...
	$index = $_GET['index'];
	
	//fetch data from json
	$data = file_get_contents('users.json');
	$data = json_decode($data);
	
	foreach ($data as $key => $value) {
		if ($value->id == $index) {
			//delete the row with the index
			unset($data[$key]);
			
			//encode back to json
			$data = json_encode($data, JSON_PRETTY_PRINT);
			file_put_contents('users.json', $data);
		}
	}
} catch (\Throwable $th) {
	//throw $th;
	echo '<div class="alert alert-dark" role="alert">';
	echo $th;
	echo '</div>';
}


header('location: index.php');
