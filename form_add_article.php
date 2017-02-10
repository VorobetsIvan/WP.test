<div class="article panel panel-default">
	<form enctype="multipart/form-data" name="add_article" action="index.php" method="post">		<input type="hidden" name="view" value="add_article" />		
		<div>
			<h2 class="text-center">Новий пост</h2>
		</div>
		<div class="panel-body">
			<div class="form-group">
				<label for="add_article_title">Заголовок</label>
				<input type="text" class="form-control" id="add_article_title" placeholder="Заголовок" name="add_article_title">
			</div>
			<div class="form-group">
				<label for="add_article_category">Категорія</label>
				<select class="form-control" id="add_article_category" name="add_article_IDcategory">
					<option></option>
					<?php
						$appDB = new appDB;
						$list_cat = $appDB->GetListCategory();
						foreach ($list_cat as $key=>$value) {
			    			$id = $value['id'];
			   		 		$cat = $value['title'];
			    			echo '<option value="'.$id.'">'.$cat.'</option>';
						}
						unset($appDB);
					?>
				</select>
			</div>			

			<div class="form-group">
				<label for="add_article_img">Мініатюра (розмір має бути не більше 1 Мб формату jpg/jpeg)</label>
				<input type="file" class="form-control" id="add_article_img" placeholder="Мініатюра" name="add_article_img">
			</div>
			<div class="form-group">
				<label for="add_article_intro_text">Короткий опис</label>
				<textarea class="form-control" id="add_article_intro_text" name="add_article_intro_text">
					<?= htmlspecialchars_decode($intro_text); ?>
				</textarea>
			</div>
			<div class="form-group">
				<label for="add_article_full_text">Повний текст</label>
				<textarea class="form-control" id="add_article_full_text" name="add_article_full_text">
					<?= htmlspecialchars_decode($full_text); ?>
				</textarea>
			</div>
			<button type="submit" class="btn btn-primary" name="add_art">Зберегти</button>
		</div>
	</form>	
</div>