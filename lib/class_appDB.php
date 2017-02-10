<?php
require_once "class_config.php";

class AppDB {
	
	private $config;
	private $mysqli;


	public function __construct() {
		$this->config = new Config();
		$this->mysqli = new mysqli($this->config->host, $this->config->user_db, $this->config->password_db, $this->config->db);
		$this->mysqli->query("SET NAMES 'utf8'");
	}

	// Вибірка
	private function query($query) {
		return $this->mysqli->query($query);
	}	

	// Список категорій  
	public function GetListCategory() {
		$script_query = 'SELECT id, title FROM `blog_category` ORDER BY id';
		$result = $this->query($script_query);
		if (!result) return false;
		else {
			$i = 0;
			while ($row = $result->fetch_assoc()) {
				$data[$i] = $row;
				$i++;
			}
			$result->close();
			return $data;
		}
	}

	// Назва категорії по ID
	public function GetNameCategory($id_cat = false ) {
		if ($id_cat) {
			$script_query = 'SELECT * FROM `blog_category` WHERE `id`='.$id_cat ;	
			$result = $this->query($script_query);
			if (!result) return false;
			else {
				$row = $result->fetch_assoc();
				return $row['title'];
			}
		}
		else return false;
	}	

	// Кількість постів
	public function GetCountArticles($id_cat=false) {
		if ($id_cat) 
			$script_query = 'SELECT count(*) as count FROM `blog_artilcles` WHERE `category_id`='.$id_cat;
		else 
			$script_query = 'SELECT count(*) as count FROM `blog_artilcles`';
		$result = $this->query($script_query);
		$row = $result->fetch_assoc();
		$count_articles = $row['count'];
		return $count_articles;
	}

	// Список постів  $id_cat-ID категорії, $page_articles-номер сторінки
	public function GetListArticles($id_cat=false, $page_articles = 1) {
		// Вираховуємо к-сть постів
		$count_art = $this->GetCountArticles($id_cat);
		
		// Максимальна кількість сторінок
		$max_page_art = ceil($count_art/10);
		if ($page_articles>$max_page_art) $page_articles=$max_page_art;
		// Вибираємо інфу
		if ($id_cat) 
			$script_query = 'SELECT * FROM `blog_artilcles` WHERE `category_id`='.$id_cat.' ORDER BY `date_create` DESC LIMIT '.($page_articles*10-10).', 10 ';
		else
			$script_query = 'SELECT * FROM `blog_artilcles` ORDER BY `date_create` DESC LIMIT '.($page_articles*10-10).', 10 ';	
		// Результат
		$result = $this->query($script_query);
		if (!result) return false;
		else {
			$i = 0;
			while ($row = $result->fetch_assoc()) {
				$data[$i] = $row;
				$i++;
			}
			$result->close();
			return $data;
		}
	}

	
	// Пост по ID
	public function GetArticle( $id_article = false ) {
		if ($id_article) {
			$script_query = 'SELECT * FROM `blog_artilcles` WHERE `id`='.$id_article ;	
			$result = $this->query($script_query);
			if (!result) return false;
			else {
				$i = 0;
				while ($row = $result->fetch_assoc()) {
					$data[$i] = $row;
					$i++;
				}
				$result->close();
				return $data;
			}
		}
		else return false;
	}

	// Перевірка наявності мініатюри
	public function isImg ($NameFile) {
		$script_query = 'SELECT count(*) as count FROM `blog_artilcles` WHERE `name_img`="'.$NameFile.'"';
		$result = $this->query($script_query);
		$row = $result->fetch_assoc();
		$count = $row['count'];
		if ($count>0) return true;
		else return false;		
	}

	// Додавати поста
	public function addArticle($title, $id_category, $intro_text, $full_text, $name_img, $author) {
		$script_query = 'INSERT INTO `blog_artilcles`(`title`, `category_id`,`intro_text`, `full_text`, `name_img`, `author`) 
						 VALUES ("'.$title.'", '.$id_category.',"'.$intro_text.'","'.$full_text.'","'.$name_img.'","'.$author.'" )';	
		$result = $this->query($script_query);
		return $result;			
	}


	// Перевірка наявності логіна
	public function isLogin ($login) {
		$script_query = 'SELECT count(*) as count FROM `blog_users` WHERE `login`="'.$login.'"';
		$result = $this->query($script_query);
		$row = $result->fetch_assoc();
		$count = $row['count'];
		if ($count>0) return true;
		else return false;		
	}

	// Додавати користувача
	public function addUser($login, $name, $hash_password) {
		$script_query = 'INSERT INTO `blog_users`(`login`, `name`, `hash_password`) 
						 VALUES ("'.$login.'","'.$name.'","'.$hash_password.'")';	
		$result = $this->query($script_query);
		return $result;			
	}

	// Авторизація користувача
	public function isAuthUser($login, $hash_password) {
		$script_query = 'SELECT count(*) as count FROM `blog_users` WHERE `login`="'.$login.'" AND `hash_password`="'.$hash_password.'" ';
		$result = $this->query($script_query);
		$row = $result->fetch_assoc();
		$count = $row['count'];
		if ($count>0) return true;
		else return false;	
	}

	//Визначення "адміністративності" користувача
	public function isAdmin($login) {
		$script_query = 'SELECT pr_admin FROM `blog_users` WHERE `login`="'.$login.'" ';
		$result = $this->query($script_query);
		$row = $result->fetch_assoc();
		return $row['pr_admin'];
	}

	// Список коментарів
	public function GetListComments($id_article) {
		$script_query = 'SELECT * FROM `blog_comments` WHERE `id_article`= '.$id_article.' ORDER BY date_create DESC';
		$result = $this->query($script_query);
		if (!result) return false;
		else {
			$i = 0;
			while ($row = $result->fetch_assoc()) {
				$data[$i] = $row;
				$i++;
			}
			$result->close();
			return $data;
		}
	}

	// Додавати коментар
	public function AddComment($id_article_comment, $login_comment, $text_comment) {
		$script_query = 'INSERT INTO `blog_comments`(`id_article`, `user`,`text_comment`) 
						 VALUES ('.$id_article_comment.',"'.$login_comment.'","'.$text_comment.'" )';	
		$result = $this->query($script_query);
		return $result;			
	}


}

?>