<?php

// Загружаємо форму 
if (!isset($request["add_art"]) && $_SESSION["pr_admin"]) {
	require_once "form_add_article.php";
}

// опрацьовуємо запит від форми
if (isset($request["add_art"]) && $_SESSION["pr_admin"]) {
	$error = false;
	$type = $_FILES['add_article_img']['type'];
  	$size = $_FILES['add_article_img']['size'];
  	$name_img = mb_strtolower($_FILES["add_article_img"]["name"], 'UTF-8');
	$title =  htmlspecialchars($_POST["add_article_title"]);
	$id_category = $_POST["add_article_IDcategory"];
	$intro_text = htmlspecialchars($_POST["add_article_intro_text"]);
	$full_text = htmlspecialchars($_POST["add_article_full_text"]);
	$login = $_SESSION["login"];

	// Якщо є файл для загрузки перевіряємо коректність
	if (!$_FILES['add_article_img']['error'] == 4) {
		// Перевірка коректності файла
	  	// перевірка чи файл типу jpg/jpeg
		if (($type != "image/jpg") && ($type != "image/jpeg")) $error = $error.'Невірний тип файла<br>';
		// Перевірка розміру файла
		if ($size > 1024000) $error = $error.'Файл має більше 1Мб.<br>';
	  	// Перевірка чи при завантаженні не було помилки
	  	if (!$_FILES['add_article_img']['error']==0) $error = $error.'Помилка завантаження файла. <br>';
		// Перевіряємо чи даний файл є в БД і використовується	
	  	$appDB = new appDB;
			$isImg = $appDB->isImg($name_img);
		unset($appDB);
		if ($isImg) $error = $error.'Файл з вказаною назвою вже існує в БД. Переіменуйте. <br>';
	};

	// Перевіряємо щоб були поля не були пустими
	if (strlen($title) == 0) $error = $error.'Введіть заголовок поста. <br>';
	if (strlen($intro_text) == 0) $error = $error.'Введіть текст в "короткий опис". <br>';
	if (strlen($full_text) == 0) $error = $error.'Введіть текст в "Повний текст". <br>';


	if(!$error){
  		// Якщо є файл то грузимо
  		if (!$_FILES['add_article_img']['error'] == 4) {
	  		// Загружаємо файл
			$uploadfile = "pic_article/".$_FILES["add_article_img"]["name"];
	  		move_uploaded_file($_FILES["add_article_img"]["tmp_name"], $uploadfile); 
	  	};

		// Записуємо пост в БД
		$appDB = new appDB;
		$res = $appDB->addArticle($title, $id_category, $intro_text, $full_text, $name_img, $login);
		unset($appDB);

		if ($res) echo '<div class="alert alert-success"><p class="message">Пост збережено</p></div>';
		else $error = $error.'Виникла помилка при збереженні<br>';

	}
	if ($error){
		echo '<div class="alert alert-warning"><p class="message">'.$error.'</p></div>';
		require_once "form_add_article.php";
	}

} 


?>