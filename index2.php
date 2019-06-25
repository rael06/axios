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
	<section id="vm" class="hide">
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
			<table class="main_table hide">
				<thead>
					<tr>
						<th>Delete</th>
						<th>Game</th>
					</tr>
				</thead>
				<tbody>
					<tr v-for="game in arrayOfGames">
						<td><button @click.prevent="deleteGame" :value="JSON.stringify(game)">Delete</button></td>
						<td>{{ game.Title }}</td>
					</tr>
				</tbody>
			</table>
		</div>
	</section>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.19.0/axios.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/vue@2.6.0/dist/vue.js"></script>
	<script src="vm.js"></script>
</body>

</html>