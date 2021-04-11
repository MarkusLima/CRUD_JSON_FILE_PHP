<?php
$data = file_get_contents('users.json');
$data = json_decode($data);
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
</head>

<body>
	<div class="container">
		<h3 align="center">CRUD JSON</h3>
		<div class="table-responsive">
			<table class="table table-hover table-condensed">
				<tr>
					<th>Id</th>
					<th>Nome</th>
					<th>Sobrenome</th>
					<th>Endereço</th>
					<th>Sexo</th>
					<th>Action</th>
				</tr>
				<tbody>
					<tr>
						<?php foreach ($data as $row) : ?>
							<td><?= $row->id ?></td>
							<td><?= $row->firstname ?></td>
							<td><?= $row->lastname ?></td>
							<td><?= $row->address ?></td>
							<td><?= $row->gender ?></td>
							<td>
								<a href="edit.php?index=<?= $row->id ?>" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i> EDITAR</a>
								<a href="delete.php?index=<?= $row->id ?>" class="btn btn-sm btn-danger" onclick="return confirm('Tem certeza?')"><i class="fa fa-trash"></i> APAGAR</a>
							</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
		</div>
		<button type="button" class="btn btn-sm btn-success" data-toggle="modal" data-target="#exampleModalCenter">
			<i class="fa fa-plus"></i> Novo Cliente
		</button>
	</div>
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/all.js"></script>
</body>

<?php require_once("add.php"); ?>

</html>