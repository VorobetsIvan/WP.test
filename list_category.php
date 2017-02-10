<div class="list-group">
	<h2>Категорії</h2>
	<a href="index.php?view=main" class="list-group-item">Всі пости</a>
	<?php
		$appDB = new appDB;
			$list_cat = $appDB->GetListCategory();
			foreach ($list_cat as $key=>$value) {
			    $id = $value['id'];
			    $title = $value['title'];
			    echo '<a href="index.php?view=main&id_cat='.$id.'" class="list-group-item">'.$title.'</a>';
			}
		unset($appDB);
	?>
</div>
