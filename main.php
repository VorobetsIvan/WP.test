<?php
	/* Номер сторінки з $_request*/
	$page_articles = $request["page_articles"];
	/* Якщо немає зчитуємо номер сторінки з SESSION-масива*/
	if ($page_articles == "") $page_articles = $_SESSION['page_articles'];
	/* Якщо не має номера ставимо 1 */
	if (is_int($page_articles) || $page_articles == "" || $page_articles == 0) $page_articles = 1;
	/* Якщо негативний номер ставимо 1 */
	if ($page_articles < 0) $page_articles = 1;	
	

		$appDB = new appDB;
			
			if (isset($request["id_cat"])) 
				$list_articles = $appDB->GetListArticles($request["id_cat"], $page_articles);
			else 
				$list_articles = $appDB->GetListArticles(false, $page_articles);
			
			if (!$list_articles) {
				echo "<h2>Постів в даній категорії немає</h2>"; 
				unset($appDB);
				return;
			} 
				 
			foreach ($list_articles as $key=>$value) {
			    $id = $value['id'];
			    $id_cat = $value['category_id'];
			    $title = $value['title'];
				$intro_text = htmlspecialchars_decode($value['intro_text']);
				$name_img = $value['name_img'];
				$author = $value['author'];
				
				$date_create = new DateTime($value['date_create']);
				$date_create = date_format($date_create, 'd.m.Y');

				$name_cat =  $appDB->GetNameCategory($id_cat);
?>

				<!-- Виводимо дані -->
					<div class="list_article panel panel-default">
						<div>
							<h2 class="text-center"><?= $title ?></h2>
						</div>
						<div class="panel-body">
							<?php if (isset($name_img) && strlen($name_img)>0) echo '<img src="pic_article/'.$name_img.'" alt="">'; ?>
							<?= $intro_text ?>
						</div>
						<div class="panel-footer">
							<div class="author"><b><?= $date_create ?></b> 
												<?if (isset($author)) echo 'Автор: <b>'.$author.'</b>';?>
							<a href="index.php?view=main&id_cat=<?= $id_cat ?>"><?= $name_cat ?></a>
							</div>
							<div class="more"> <a href="index.php?view=article&id_article=<?= $id ?>">
							Детальніше...</a></div>
						</div>
					</div>

<?php
			}
		
		// Дані для пагінації
		$page_articles_back = $page_articles - 1;
		$page_articles_next = $page_articles + 1;
		$count_art = $appDB->GetCountArticles($request["id_cat"]);
		$max_page_articles = ceil($count_art/10);

		unset($appDB);
?>


<!================= pagination =======================>	
<nav id="pagination" aria-label="Page navigation">
	<ul class="pagination">
		<?php if (!$page_articles_back < 1) {
			echo '<li><a href="index.php?view=main&id_cat='.$request["id_cat"].'&page_articles='.$page_articles_back.'"><span aria-hidden="true">&laquo;</span></a></li>';
			echo '<li><a href="index.php?view=main&id_cat='.$request["id_cat"].'&page_articles='.$page_articles_back.'">'.$page_articles_back.'</a></li>';
		}?>
		<li><a ><?= $page_articles; ?></a></li>
		<?php if ($page_articles_next <= $max_page_articles) {
			echo '<li><a href="index.php?view=main&id_cat='.$request["id_cat"].'&page_articles='.$page_articles_next.'">'.$page_articles_next.'</a></li>';
			echo '<li><a href="index.php?view=main&id_cat='.$request["id_cat"].'&page_articles='.$page_articles_next.'"><span aria-hidden="true">&raquo;</span></a></li>';			
		}?>
	</ul>
</nav>
<?php
	// Зберігаємо в сесії номер сторінки
	$_SESSION['page_articles'] = $page_articles;
?>
<!================= END pagination =======================>	