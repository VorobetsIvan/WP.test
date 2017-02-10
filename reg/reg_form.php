<h1>Реєстрація</h1>
<div id="reg">
	<div id="reg_error"></div>
	<form name="form_reg" action="index.php" method="post">
	    <input type="hidden" name="view" value="reg" />
	    <div class="form-group">
		    <label for="reg_login">Введіть логін</label>
		    <input type="text" class="form-control" name="login" id="reg_login" placeholder="Логін">
		</div>
	    <div class="form-group">
		    <label for="reg_name">Введіть ім'я</label>
		    <input type="text" class="form-control" name="name" id="reg_name" placeholder="Ім'я">
		</div>

		<div class="form-group">
				<label for="reg_password">Введіть пароль</label>
			<input type="password" class="form-control" name="password" id="reg_password" placeholder="Пароль">
		</div>
		<div class="form-group">
				<img src="reg/captcha.php" alt="Каптча">
		</div>
		<div class="form-group">
				<label for="reg_captcha">Перевірочний код</label>
			<input type="text" class="form-control" name="captcha"  id="reg_captcha" placeholder="Перевірочний код">
		</div>

		<button type="submit" class="btn btn-primary" name="reg">Зареєструватися</button> 
	</form>
</div>