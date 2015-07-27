<?php
session_start();
include('config.php');
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

	<title>Начало - Рецептите</title>
</head>
<body>

	<div class="container">
	<div class="row">
		<div class="header col-md-12 just">
			<div class="row">
				<div class="header_text col-xs-4">
					<h3>Приложение за рецепти</h3>
				</div>
				<div class="header_reg_log_search col-md-4 col-md-offset-4">
					

					<div class="row">
					  
					  <div class="col-lg-6">
					    <div class="input-group">
					      <input type="text" class="form-control" placeholder="Search">
					      <span class="input-group-btn">
					        <button class="btn btn-default" type="button">Go!</button>
					      </span>
					    </div><!-- /input-group -->
					  </div><!-- /.col-lg-6 -->
					  
					</div><!-- /.row -->


				</div>
			</div>
			
		</div>
	</div>
		<div class="row">
			<div class="col-md-12 just">
				<div class="first text-center col-xs-6 col-xs-offset-3">
					<div class="row">
						<div class="col-xs-8 col-xs-offset-2">						

							<?php

								if ($_SESSION) {
									
									echo "<p class='navbar-text'>Здравей, ";
									echo  $_SESSION['user'] . '!</p>';
									echo '<br /><a title="Изход" href="logout.php">Изход</a>';
								}else{

									echo "<p class='navbar-text'>Здравей, гост!</p>";
									echo "<p class='navbar-text'>Искаш ли да се <a title='Регистрация'' href='register.php'>регистрираш?</a></p>";
									echo "<p class='navbar-text'>Или пък вече имаш регистрация? <a title='Вход' href='login.php'>Вход</a></p>";

								}
								
							?>		

						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	
</body>
</html>