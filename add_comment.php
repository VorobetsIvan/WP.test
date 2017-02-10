<?php
	$id_article_comment = $_POST['id_article_comment'];
	$login_comment = $_POST['login_comment'];
	$text_comment = htmlspecialchars($_POST['text_comment']);

	// Записуємо коментар в БД
	require_once "lib/class_appDB.php";
  	$appDB = new appDB;
		$res_add = $appDB->AddComment($id_article_comment, $login_comment, $text_comment);
	unset($appDB);

	echo json_encode(array("1" => $res_add));

?>