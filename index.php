<?php 
	session_start(); 
?>
<DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Блог (тестове завдання для вступу на курси WP)</title>
	<meta name="description" content="Блог">
	<meta name="keywords" content="блог, пост, пости, новини">
	<!-- Bootstrap -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	    <!--[if lt IE 9]>
	      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
	      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	    <![endif]-->
	<link rel="stylesheet" href="css/main.css">
</head>
<body>
	<?php require_once "lib/class_appDB.php"; 
		  $request = array_merge($_POST, $_GET);
	?>
	<header class="container ">
		<h1 class="text-center">Блог (тестове завдання для вступу на курси WP)</h1>
	</header>
	<div class="container">
		<div class="row">
			<!======================left bar =======================>
			<div class="col-md-3 leftbar"> 
				<div class='auth'>
					<?php require_once "auth/auth.php"; ?>
				</div>

				<?php require_once "list_category.php"; ?>

			</div>
			<!================= END left bar =======================>
			<!================= main_content =======================>
			<div class="col-md-9 main_content">
				<?php
					$view = $request["view"];
					switch ($view) {
							case "":
								require_once "main.php";
							break;
							case "main":
								require_once "main.php";
							break;
							case "reg":
								require_once "reg/reg.php";
							break;
							case "article":
								require_once "article.php";
							break;
							case "add_article":
								require_once "add_article.php";
							break;
							default:
								require_once "main.php";
					}			
				?>
			</div>
			<!================= END main_content =======================>
		</div>
	</div>
	<footer class="container">
		<p class="text-center">Всі права захищені &copy; 2017</p>
	</footer>	



    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script>
    	CKEDITOR.replace("add_article_intro_text");
    	CKEDITOR.replace("add_article_full_text");
    </script>
    <script type='text/javascript' src='js/value_reg.js'></script>
    <script type='text/javascript' src='js/add-comment.js'></script>
</body>
</html>