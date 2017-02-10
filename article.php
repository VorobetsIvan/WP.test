<?php
		$appDB = new appDB;
			if (isset($request["id_article"]))
				$article = $appDB->GetArticle($request["id_article"]);
			
			if (!$article) {
				echo "<h2>Запитуваного поста немає</h2>"; 
				unset($appDB);
				return;
			} 
				 
			foreach ($article as $key=>$value) {
			    $id = $value['id'];
			    $id_cat = $value['category_id'];
			    $title = $value['title'];
				$full_text = htmlspecialchars_decode($value['full_text']);
				$name_img = $value['name_img'];
				$author = $value['author'];
				
				$date_create = new DateTime($value['date_create']);
				$date_create = date_format($date_create, 'd.m.Y');

				$name_cat =  $appDB->GetNameCategory($id_cat);
?>

	<div class="article panel panel-default">
		<div>
			<h2 class="text-center"><?= $title ?></h2>
		</div>
		<div class="panel-body">
			<?php if (isset($name_img)) echo '<img src="pic_article/'.$name_img.'" alt="">'; ?>
			<?= $full_text ?>
		</div>
	
	<?php
		require_once("comment.php");
	?>

		<div class="panel-footer">
			<div class="author"><b><?= $date_create ?></b> 
								<?if (isset($author)) echo 'Автор: <b>'.$author.'</b>';?>  
				<a href="index.php?view=main&id_cat=<?= $id_cat ?>"><?= $name_cat ?></a>
			</div>
		</div>
	</div>

<?php
			}
		unset($appDB);

?>