<?php
session_start();
require_once('config.php');
$filename = basename($_SERVER['REQUEST_URI'], '?'.$_SERVER['QUERY_STRING']);
$select_page_titile = "SELECT * FROM menu WHERE link = '$filename'";
require_once('functions/queries.php');
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

	<title><?php 
	
	if ($_GET) {
		if (isset($_GET['article'])) {
			
			$query = "SELECT `articles`.`title_article` as art, `categories_article`.`category` as cat FROM 
			`articles` JOIN `categories_article` ON `articles`.`id_category`=`categories_article`.`id_category` 
			WHERE `articles`.`id_article` = '$_GET[article]'";
			
			$result = mysqli_fetch_assoc(queries($connect, $query));

			echo $result['art'] . ' - ' . $result['cat'] . ' - ' . $fetch_row['link_name'];			

		}elseif(isset($_GET['category'])){			


			$query = "SELECT category FROM categories_article WHERE id_category = '$_GET[category]'";
			
			$result = mysqli_fetch_assoc(queries($connect, $query));
			echo $result['category'] . ' - ' . $fetch_row['link_name'];

		}
	}else{

		if ($fetch_row['link_name']) {
			echo $fetch_row['link_name'];
		}else{
			echo $_SESSION['user'];
		}
		

	}
	

	?> - Рецептите</title>
</head>
<body>
	<div class="container">
	<div class="row">
		<div class="header col-md-12 just">
			<div class="row">
			<a href="index.php">
				<div class="header_text col-xs-4">
					<h3>рецептите</h3>
					<p class="header_label">"диабетът не е диагноза, а начин на живот"</p>
				</div>
			</a>
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
									
									echo "Здравей, <a href='main.php'>";
									echo  $_SESSION['user'] . '</a>!';
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