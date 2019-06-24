<?php
require "Database.php";
if (isset($_POST["delete"])) {
	$game = $_POST["delete"];
	Database::db_query("DELETE FROM videogames WHERE Title = '$game'");
	echo "J'ai été rechargé";
}
if (isset($_POST["refresh"])) unset($_POST);
$games = Database::db_query("SELECT Title FROM videogames");
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Document</title>
</head>

<body>
	<section>
		<form action="" method="POST" id="form"></form>
		<button form="form" name="refresh">Refresh</button>
		<table>
			<thead>
				<tr>
					<th>Title</th>
				</tr>
			</thead>
			<tbody>
				<?php foreach ($games as $game) : ?>
					<tr>
						<td><button value="<?= $game->Title ?>" name="delete" form="form">Delete</button></td>
						<td><?= $game->Title ?></td>
					</tr>
				<?php endforeach ?>
			</tbody>
		</table>
	</section>
</body>

</html>