<?php
$index = $_GET['index'];
$data = file_get_contents('users.json');
$data_array = json_decode($data);
$row = array();

foreach ($data_array as $key => $value) {
	if ($value->id == $index) {
		$row = $data_array[$key];
		$index = $data_array[$key];
	}
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>CRUD JSON</title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="Markus Lima">
	<link href="assets/css/bootstrap.min.css" rel="stylesheet">
	<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div class="container">
		<h3 align="center">CRUD JSON</h3>
		<div class="row">
			<div class="col-md-6 col-md-offset-3">
				<form action="" method="POST" enctype="multipart/form-data">
					<div class="panel panel-primary">
						<div class="panel-heading"><i class="fa fa-edit"></i> EDITAR </div>
						<div class="panel-body">
							<div class="form-group">

								<input type="hidden" id="id" name="id" value="<?php echo $row->id; ?>" type="text">

								<label for="nama">Nome : </label>
								<input class="form-control" id="firstname" name="firstname" value="<?php echo $row->firstname; ?>" type="text">
							</div>

							<div class="form-group">
								<label for="alamat">Sobrenome : </label>
								<input class="form-control" id="lastname" name="lastname" value="<?php echo $row->lastname; ?>" type="text">
							</div>

							<div class="form-group">
								<label for="alamat">Endereço : </label>
								<input class="form-control" id="address" name="address" value="<?php echo $row->address; ?>" type="text">
							</div>

							<div class="form-group">
								<label for="alamat">Sexo : </label>
								<input class="form-control" id="gender" name="gender" value="<?php echo $row->gender; ?>" type="text">
							</div>

						</div>
						<div class="panel-footer">
							<input type="submit" name="save" value="Atualizar" class="btn btn-sm btn-primary">
							<a href="index.php" class="btn btn-sm btn-danger"> Home</a>
						</div>
					</div>

				</form>
			</div>
		</div>
	</div>

	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/all.js"></script>

	<?php

	try {
		//code...
		if (isset($_POST['save'])) {
			$input = array(
				'id' => $_POST['id'],
				'firstname' => $_POST['firstname'],
				'lastname' => $_POST['lastname'],
				'address' => $_POST['address'],
				'gender' => $_POST['gender']
			);

			$data = file_get_contents('users.json');
			$data_array = json_decode($data);

			foreach ($data_array as $key => $value) {
				if ($value->id == $_POST['id']) {
					$data_array[$key] = $input;
					$data = json_encode($data_array, JSON_PRETTY_PRINT);
					file_put_contents('users.json', $data);
				}
			}
			header('location: index.php');
		}
	} catch (\Throwable $th) {
		//throw $th;
		echo '<div class="alert alert-dark" role="alert">';
		echo $th;
		echo '</div>';
	}
	?>
</body>

</html>