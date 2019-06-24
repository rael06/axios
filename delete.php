<?php
require "Database.php";
$dataStr = file_get_contents("php://input");
$data = json_decode($dataStr);
$gameTitle = $data->Title;
Database::db_query("DELETE FROM videogames WHERE Title = '$gameTitle'");
?>