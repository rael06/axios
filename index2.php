<?php
require "Database.php";
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
	<section id="vm">
		<table>
			<thead>
				<tr>
					<th>Title</th>
				</tr>
			</thead>
			<tbody>
					<tr v-for="game in arrayOfGames">
						<td><button @click.prevent="deleteGame" :value="JSON.stringify(game)">Delete</button></td>
						<td>{{ game.Title }}</td>
					</tr>
			</tbody>
		</table>
	</section>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue@2.6.0/dist/vue.js"></script>
	<script src="vm.js"></script>
</body>

</html>