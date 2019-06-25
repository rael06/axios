"use strict";

function loading() {
	document.querySelectorAll(".box h1").forEach(element => element.classList.remove("hide"));
	document.querySelectorAll(".box img").forEach(element => element.classList.add("hide"));
}

function tableLoading() {
	document.querySelector(".main_table").classList.remove("hide");
	document.querySelector(".scroller img").classList.add("hide");
}

setTimeout(function () {
	loading();
	tableLoading();
}, 2000);