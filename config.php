<?php

$connect = mysqli_connect('localhost', 'root', 'p8908271860', 'foods_project');
mysqli_set_charset($connect, "utf8");
if (!$connect) {
	
	die("Connection failed: " . mysqli_connect_error());

}