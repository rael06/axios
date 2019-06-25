<?php
require "Database.php";
if (isset($_POST["delete"])) {
	$game = $_POST["delete"];
	Database::db_query("DELETE FROM videogames WHERE Title = '$game'");
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
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<section>
		<form action="" method="POST" id="form"></form>
		<button form="form" name="refresh" class="refresh_button">Refresh</button>
		<div class="box box1">
			<h1 class="hide">Fake table 1</h1>
			<img src="loader.gif" alt="loader" class="loader">
		</div>
		<div class="box box2">
			<h1 class="hide">Fake table 2</h1>
			<img src="loader.gif" alt="loader" class="loader">
		</div>
		<div class="scroller">
			<img src="loader.gif" alt="loader" class="loader">
			<table class="main_table">
				<thead>
					<tr>
						<th>Delete</th>
						<th>Game</th>
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
		</div>
	</section>
	<script src="main.js"></script>
</body>

</html>