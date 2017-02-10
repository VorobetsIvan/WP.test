
<?php
	// Приймаємо дані від форми реєстрації
	if (isset($request["reg"])) {
		// Зчитуємо дані
		$session_captcha = $_SESSION["rand"];
		$login = htmlspecialchars($request["login"]);
			$config = new Config();
			$hash_password = md5($request["password"].$config->secret);
			unset($config);
		$name = htmlspecialchars($request["name"]);
		$captcha = $request["captcha"];

		$appDB = new appDB;
		$isLogin = $appDB->isLogin($login);
		unset($appDB);

		// Перевіряємо чи капчі збігаються
		if ($captcha != $session_captcha) {
			echo '<div class="alert alert-warning">
						<p class="message">Реєстрація не проведена. <b>Невірно внесено перевірочний код.</b><br>
						Спробуйте <a href="index.php?view=reg">зареєструватися</a> ще раз.</p>
				 </div>';
		}
		// Чи є логін
		elseif ($isLogin) {
			echo '<div class="alert alert-warning">
						<p class="message">Реєстрація не проведена. <b>Вказаний логін вже існує.</b><br>
						Спробуйте <a href="index.php?view=reg">зареєструватися</a> ще раз.</p>
				 </div>';
		} 
		else {
			// Записуємо інформацію про користувача в БД
			$appDB = new appDB;
				if ($appDB->addUser($login, $name, $hash_password)) {
					echo '<div class="alert alert-success">
						<p class="message">Реєстрація користувача з логіном <b>'.$login.'</b> успішно проведена. <br>
						Спробуйте ввійти на сайт під зареєстрованим логіном.</p>
				 	</div>';
				}
				else {
					echo '<div class="alert alert-warning">
						<p class="message">Реєстрація не проведена. Виникла системна помилка.<br>
						Спробуйте <a href="index.php?view=reg">зареєструватися</a> ще раз.</p>
				 	</div>';
				}
			unset($appDB);
		}
	}
	// Інакше виводимо форму
	else {
		// Виводимо форму для реєстрації
		require_once "reg_form.php";
	}
?>