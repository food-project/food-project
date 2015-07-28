<?php
session_start();
require_once('config.php');
$filename = basename($_SERVER['REQUEST_URI'], '?'.$_SERVER['QUERY_STRING']);
$select_page_titile = "SELECT * FROM menu WHERE link = '$filename'";
$query_s_page = mysqli_query($connect, $select_page_titile)or die(mysqli_error());
$fetch_row = mysqli_fetch_assoc($query_s_page);
?>
<!DOCTYPE html>
<html>
<head>
	<link href="css/js-image-slider.css" rel="stylesheet" type="text/css" />
    <script src="js/js-image-slider.js" type="text/javascript"></script>
    <link href="css/generic.css" rel="stylesheet" type="text/css" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
	<!--JQuery CDN-->
	<script src="jquery-1.11.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<title><?php echo $fetch_row['link_name'] ?> - Рецептите</title>
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
					  
					  <?php

								if ($_SESSION) {
									
									echo "Здравей, ";
									echo  $_SESSION['user'] . '!';
									echo ' <a title="Изход" href="logout.php">Изход</a>';
								}else{
									echo "<a title='Регистрация'' href='register.php'>Регистрация </a> ";
									echo " <a title='Вход' href='login.php'>Вход</a>";

								}
								
							?>	

					</div><!-- /.row -->


				</div>
			</div>
			
		</div>
	</div>
		<div class="row">
			<div class="col-md-12 just">
				<div class="first text-center col-xs-12">
					<div class="row">
						<div class="newclas col-xs-12">						

								
								<!--                започва менюто			-->

									<ul class="nav nav-tabs">
									<?php

										$q_menu = "SELECT * FROM menu";
										$sql_menu = mysqli_query($connect, $q_menu)or die(mysqli_query());

										if (mysqli_num_rows($sql_menu) > 0) {

											while ($res = mysqli_fetch_assoc($sql_menu)) {

												if ($filename == $res['link']) {
													
													echo "<li class='active' role='presentation'><a href=";
													echo $res['link'];
													echo ">";
													echo $res['link_name'];
													echo "</a></li>";

												}else{ 
													echo "<li role='presentation'><a href=";
													echo $res['link'];
													echo ">";
													echo $res['link_name'];
													echo "</a></li>";
												}

											}
										}

									?>
									  
									  
									</ul>
								<!--                край на  менюто			-->


						</div>
					</div>
				</div>
			</div>
		</div>