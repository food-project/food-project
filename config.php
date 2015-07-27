<?php

  $host = "localhost";
	$username = "root"; //root
	$password = "p8908271860"; //  peter8908271860
	$bd = "foods_project";  // petrovphotography    

	    $connect = mysql_connect($host, $username, $password) or die (mysql_error());
		mysql_select_db($bd, $connect);
		mysql_query("SET CHARACTER SET UTF8");
