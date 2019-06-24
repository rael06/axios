<?php
require "Database.php";
$games = Database::db_query("SELECT Title FROM videogames");
print(json_encode($games));
?>