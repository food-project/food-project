<?php
session_start();
include('config.php');
if (!$_SESSION) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!--JQuery CDN-->
	<script src="jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
	<title>Вход в системата на - Рецептите.eu</title>
</head>
<body>
	<form method="post" action="">
		
		<table id="register_table">

			<tr>
				<td class="uppercase_text" colspan="2">вход в системата</td>
			</tr>
			<?php

				if (isset($_POST['submit'])) {
					
					echo '<tr>';

						$username 			= 	htmlspecialchars(trim($_POST['username']));
						$pass 			= 	htmlspecialchars(trim($_POST['pass']));

						$check_username 	= 	mysql_query("SELECT email FROM users WHERE username = '$username'") or die (mysql_error());
						$num_username 		= 	mysql_num_rows($check_username);

						$check_pass 	= 	mysql_query("SELECT password, username FROM users WHERE username = '$username'") or die (mysql_error());
						$result 		= 	mysql_fetch_array($check_pass);

						

							if ($num_username == 1) {
								
								$sha_pass = sha1($pass);

								if ($sha_pass == $result['password']) {
								
									$_SESSION['user'] 		= 		$result['username']; // създавам сесия с email-а

									echo '<td colspan="2">';

									echo '<p class="success">Здравей, ';
									echo $_SESSION['user'];
									echo '</p>';

									echo '<p class="success">Успешно влезе в системата!</p>';

									echo '</td>';
									header('Location: index.php'); // !!! да се препрати към профила на потребителя ex: main.php

								}else{

									echo '<td colspan="2"><p class="error">Невалидна парола!</p></td>';

								}

							}else{

								echo '<td colspan="2"><p class="error">Нещо се обърка! Работим по отстраняването на проблема</p></td>'; // а проблем наистина има, защото е открил два еднакви email-а :D :D провери регистрацията register.php

							}

						

					echo '</tr>';

				}

			?>
			<tr>
				<td>Потребителско име:</td><td><input type="text" name="username" value="" /></td>
			</tr>
			<tr>
				<td>Парола:</td><td><input type="password" name="pass" value="" /></td>
			</tr>
			<tr>
				<td colspan="2"><input type="submit" name="submit" value="Вход"></td>
			</tr>
		</table>
	</form>
</body>
</html>
<?php
}
else{
	header('Location: index.php'); // логнал се потребител се опитва да влезе в logout.php
}