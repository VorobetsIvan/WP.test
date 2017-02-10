<div class="panel panel-default">
	<div class="panel-heading">
		<h4>Коментарі</h4>
	</div>
	<div class="panel-body">
    	
<?php
	// якщо користувач зареєстрований то додаємо форму для коментування
	if (isset($_SESSION["login"])) {
		?>
			<div class="form-group">
				<label hidden="true" id="id_article_comment"><?= $id; ?></label>
				<label for='text_comment' id="login_comment"><?= $_SESSION["login"]; ?></label>
				<textarea class= 'form-control' name='text_response' id='text_comment'></textarea>
				<button class="btn btn-info" id='btn_add_comment'>Залишити коментар</button>
			</div>
		<?php
	}

	echo '<div id="comments">';
	// Виводимо коментарі з БД
	$appDB = new appDB;
		$list_comments = $appDB->GetListcomments($id);
		if ($list_comments) {
			foreach ($list_comments as $key=>$value) {
			    $user = $value['user'];
			    $text_comment = $value['text_comment'];
			    echo '<div class="alert alert-info">';
			    echo ' <p><b>'.$user.'</b></p>';
			 	echo ' <p class="message">'.htmlspecialchars_decode($text_comment).'</p>';
			 	echo '</div>';
			}
		}
	unset($appDB);
	echo '</div>';

?>    		


  	</div>
</div>