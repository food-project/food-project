<?php
session_start();
require_once('config.php'); // инклудвам конфигурационния файл, защото ще ползвам mysqli база данни
if (!$_SESSION) {
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<link rel="stylesheet" type="text/css" href="css/style.css" />

	<title>Регистрация - Рецептите</title>

</head>

	<body>

		<form method="post" action="">

			<table id="register_table">

				<tr>
					<td class="uppercase_text" colspan="2">Регистрация</td>
				</tr>

				<?php
					// започвам php кода вътре във формата и таблицата за да отпечатвам отговорите вътре в таблицата за по-прегледно
					
					if (isset($_POST['submit'])) { // правя проверка дали е натиснат бутона "Регистрация" от формата
						
						echo '<tr>';

						// htmlspecialchars - премахва специалните знаци, trim - премахва празните пространства

						$username		=		trim(htmlspecialchars($_POST['username']));
						$pass1			= 		trim(htmlspecialchars($_POST['pass1']));
						$pass2			= 		trim(htmlspecialchars($_POST['pass2']));
						$email 			= 		trim(htmlspecialchars($_POST['email']));

						$query_check = "SELECT username FROM users WHERE username = '$username'";
						$chek_username  = 		mysqli_query($connect, $query_check) or die (mysqli_error());;
						$numUsers 		= 		mysqli_num_rows($chek_username);

						$queryi_email = "SELECT email FROM users WHERE email = '$email'";
						$chek_email 	= 		mysqli_query($connect, $queryi_email) or die (mysqli_error());
						$numEmail 		= 		mysqli_num_rows($chek_email);

						$date 			= 		date("j.n.Y");

						if (strlen($username) > 2) { // проверяваме за дължината на потребителското име

							if ($numUsers == 0) { // проверяваме дали не съществува потребител със същото име в системата

								if (strlen($pass1) > 2) { // проверяваме дължината на първата парола
									
									if (strlen($pass2 > 2)) { // проверяваме за дължината и на втората парола
										
										if ($pass1 == $pass2) { // проверяваме дали въведените пароли съвпадат
											
											if (filter_var($email, FILTER_VALIDATE_EMAIL)) { // проверява дали паролата е валидна

											    if ($numEmail == 0) { // проверяваме дали съществува такъв емейл в системата

											    	$pass1 = sha1($pass1); // криптираме паролата преди да се запише в базата данни

											    	$query_insert = "INSERT INTO users 
											    		(username, email, password, date) 

											    		VALUES 

											    		('$username', '$email', '$pass1', '$date')";
											    	$success = mysqli_query($connect, $query_insert) or die (mysqli_error());

											    	echo '<td colspan="2"><p class="success">Успешно се регистрира в системата!</p>
											    	<p class="success"><a href="login.php">Вход в сайта!</a></p>
											    	</td>';

											    }else{

											    	echo '<td colspan="2"><p class="error">Този email адрес вече се ползва в системата!</p></td>';

											    }												

											}else{

												echo '<td colspan="2"><p class="error">Моля, въведете валиден email адрес!</p></td>';

											}

										}else{

											echo '<td colspan="2"><p class="error">Паролите не съвпадат!</p></td>';

										}

									}else{

										echo '<td colspan="2"><p class="error">Моля, повторете с по-дълга парола. Поне 4 символа!</p></td>';

									}

								}else{

									echo '<td colspan="2"><p class="error">Моля, въведете по-дълга парола. Поне 4 символа!</p></td>';

								}							
							}else{

								echo '<td colspan="2"><p class="error">Това потребителско име вече съществува!</p></td>';

							}
						}else{

							echo '<td colspan="2"><p class="error">Моля, въведете по-дълго потребителско име!</p></td>';

						}

						echo '</tr>';

					}


				?>
				<tr>
					<td>Потребителско име:</td><td><input type="text" name="username" value="" /></td>
				</tr>

				<tr>
					<td>Парола:</td><td><input type="password" name="pass1" value="" /></td>
				</tr>

				<tr>
					<td>Повтори паролата:</td><td><input type="password" name="pass2" value="" /></td>
				</tr>

				<tr>
					<td>Email:</td><td><input type="text" name="email" value="" /></td>
				</tr>

				<tr>
					<td colspan="2"><input type="submit" name="submit" value="Регистрация" /></td>
				</tr>

			</table>
		</form>
	</body>
</html>
<?php
}
else{

	header('Location: index.php'); // логнал се потребител се опитва да влезе в register.php

}