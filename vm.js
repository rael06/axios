"use strict";

let vm = new Vue({
	el: "#vm",
	data: {
		arrayOfGames: []
	},
	methods: {
		setArrayOfGames: function() {
			let url = "webService.php";
			let setValue = function(response) {
				vm.arrayOfGames = response.data;
			};

			//---------------------------------------------------------------
			let xhr;
			try {
				xhr = new ActiveXObject("Microsoft.XMLHTTP"); // Essayer IE
			} catch (
				e // Echec, utiliser l'objet standard
			) {
				xhr = new XMLHttpRequest();
			}
			xhr.onreadystatechange = function() {
				// instructions de traitement de la réponse
				if (xhr.readyState == 4) {
					console.log(xhr.response);
					vm.arrayOfGames = xhr.response;
				} else {
					// Attendre...
				}
			};
			xhr.open("GET", url, true);
			xhr.send(null);
			//---------------------------------------------------------------

			//---------------------------------------------------------------
			// axios.get(url).then(setValue);
			//---------------------------------------------------------------
		},
		deleteGame: function (event) {
			let game = event.target.value;
			let url = "delete.php";

			//---------------------------------------------------------------
			let xhr;
			try {
				xhr = new ActiveXObject("Microsoft.XMLHTTP"); // Essayer IE
			} catch (
				e // Echec, utiliser l'objet standard
			) {
				xhr = new XMLHttpRequest();
			}
			xhr.onreadystatechange = function() {
				// instructions de traitement de la réponse
				if (xhr.readyState == 4) {
					vm.setArrayOfGames();
				} else {
					// Attendre...
				}
			};
			xhr.open("POST", url, true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.send(game);
			//---------------------------------------------------------------

			//---------------------------------------------------------------
			// axios.post(url, game).then(this.setArrayOfGames);
			//---------------------------------------------------------------
		}
	},
	mounted() {
		this.setArrayOfGames();
	}
});
