<?php
	if (isset($request["auth_in"])) {
		$login_auth = $request["login"];
		$config = new Config();
		$hash_password_auth = md5($request["password"].$config->secret);
		unset($config);

		// Перевіряємо користувача в БД
		$appDB = new appDB;
		$isAuth = $appDB->isAuthUser($login_auth, $hash_password_auth);
		unset($appDB);

		if ($isAuth) {
			// Авторизація успішна
			$_SESSION["login"] = $login_auth;
			$appDB = new appDB;
			$_SESSION["pr_admin"] = $appDB->isAdmin($login_auth);
			unset($appDB);
			echo '<div class="alert alert-success"><p class="message">Авторизація успішна</p></div>';
		}
		else {
			unset($_SESSION["login"]);
			unset($_SESSION["pr_admin"]);
			echo '<div class="alert alert-warning"><p class="message">Авторизація не успішна</p></div>';
		}
 
	}

?>


<?
if (isset($_SESSION['login'])) {
?>
	<div class="alert alert-success">
		<p class="message">Вітаємо: <b><?= $_SESSION['login']; ?></b></p>
		<?php
			if($_SESSION["pr_admin"]) {
				echo "Ви ввійшли як Адміністратор</br>";
				echo "<a href='index.php?view=add_article'>Додати новий пост</a>";
			}
		?> 
	</div>
	<a href="auth/out_auth.php">Вихід</a>
<?php
} else {
?>
	<h2>Авторизація</h2>
	<form name="auth" action="index.php" method="post">
	    <!--<input type="hidden" name="auth" value="auth" />-->
	    <div class="form-group">
		    <input type="text" class="form-control" name="login" placeholder="Логін">
		</div>
		<div class="form-group">
			<input type="password" class="form-control" name="password" placeholder="Пароль">
		</div>
		<button type="submit" class="btn btn-primary" name="auth_in">Авторизуватися</button> 
	</form>

	<a href="index.php?view=reg">Зареєструватися</a>	
<?php
}
?>

 
