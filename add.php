<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
	<div class="modal-dialog modal-dialog-centered" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle"><i class="fa fa-user"></i> Cadastrar novo Cliente</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form method="POST" enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF'] ?>">

					<div class="form-group">
						<label for="nama">Nome : </label>
						<input type="text" id="firstname" name="firstname" class="form-control" placeholder="nome..." required>
					</div>

					<div class="form-group">
						<label for="alamat">sobrenome : </label>
						<input type="text" id="lastname" name="lastname" class="form-control" placeholder="sobrenome..." required>
					</div>

					<div class="form-group">
						<label for="alamat">endereço : </label>
						<input type="text" id="address" name="address" class="form-control" placeholder="endereço..." required>
					</div>

					<div class="form-group">
						<label for="alamat">sexo : </label>
						<input type="text" id="gender" name="gender" class="form-control" placeholder="sexo..." required>
					</div>

					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
						<button type="submit" name="save" class="btn btn-md btn-success">Salvar</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php

try {
	if (isset($_POST['save'])) {
		//open the json file
		$data = file_get_contents('users.json');
		$data = json_decode($data);
	
		//data in out POST
		$input = array(
			'id' => uniqid(NULL, true),
			'firstname' => $_POST['firstname'],
			'lastname' => $_POST['lastname'],
			'address' => $_POST['address'],
			'gender' => $_POST['gender']
		);
	
		//append the input to our array
		$data[] = $input;
		//encode back to json
		$data = json_encode($data, JSON_PRETTY_PRINT);
		file_put_contents('users.json', $data);
	
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