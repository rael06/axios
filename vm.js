"use strict";

let vm = new Vue({
	el: "#vm",
	data: {
		arrayOfGames: []
	},
	methods: {
		setArrayOfGames: function () {
			let url = "webService.php";
			let setValue = function(response) {
				vm.arrayOfGames = response.data;
			};
			axios.get(url).then(setValue);
		},
		deleteGame: function (event) {
			let game = event.target.value;
			let url = "delete.php";
			axios.post(url, game).then(this.setArrayOfGames);
		}
	},
	mounted() {
		this.setArrayOfGames();
	}
});
