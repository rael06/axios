"use strict";

let vm = new Vue({
	el: "#vm",
	data: {
		arrayOfGames: []
	},
	methods: {
		setArrayOfGames: function() {
			let url = "webService.php";
			let setValue = function (response) {
				vm.arrayOfGames = response.data || JSON.parse(response);
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
					setValue(xhr.response);
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
			this.tableLoading();
			let game = event.target.value;
			let url = "delete.php";

			//--------------------------------------------------------------- AJAX
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
					setTimeout(vm.tableLoading, 2000);
				} else {
					// Attendre...
				}
			};
			xhr.open("POST", url, true);
			xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			xhr.send(game);
			//---------------------------------------------------------------

			//--------------------------------------------------------------- AXIOS
			/* axios.post(url, game).then(this.setArrayOfGames)

			.then(this.tableLoading).then(setTimeout(this.tableLoading, 2000)); */
			//---------------------------------------------------------------
		},
		loader: function () {
			document.getElementById("vm").classList.remove("hide");
			document.getElementById("vm").classList.add("show");
		},
		loading: function () {
			document.querySelectorAll(".box h1").forEach(element => element.classList.toggle("hide"));
			document.querySelectorAll(".box img").forEach(element => element.classList.toggle("hide"));
		},
		tableLoading: function () {
			document.querySelector(".main_table").classList.toggle("hide");
			document.querySelector(".scroller img").classList.toggle("hide");
		}
	},
	mounted() {
		this.setArrayOfGames();
		this.loader();
		setTimeout(function () {
			vm.loading();
			vm.tableLoading();
		}, 2000);
	}
});
