$(document).ready(function() {
	// Виклик функції перевірки даних перєстрації перед відправкою
	$("form[name='form_reg']").bind("submit", value_reg);
});

var global_per_login;


// пройде перевірка тоді відправимо
function value_reg() {
	//var global_per_login;
	// Обнуляємо признак "хорошості"
	var rez_value = true;
	var text_rez_value = "";
	// ПЕРЕВІРКА ЛОГІНА
		// Зчитуєм логін
		var login = $("#reg_login").val();
		// Перевіряємо довжину логіна
		if (login.length<4 || login.length>20)	{
			rez_value = false;
			text_rez_value = text_rez_value+"Логін повинен містити від 4 до 20 символів. </br>";
		}
		// Перевіряємо коректність логіна
		if (!login.match(/^[a-zA-Zа-яА-Я0-9і-іІ-Іґ-ґҐ-Ґї-їЇ-Ї\-_ \s]+$/)) {
			rez_value = false;
			text_rez_value = text_rez_value+"Логін повинен містити лише букви, цифри, дефіси і підкреслення. </br>";
		}
		
	// ПЕРЕВІРКА ПАРОЛЯ
		if ($("#reg_password").val().length<3)	{
			rez_value = false;
			text_rez_value = text_rez_value+"Пароль повинен містити більше 3 символів. </br>";
		}

	// Перевіряємо коректність капічі
		if (!($("#reg_captcha").val().length == 4)) {
			rez_value = false;
			text_rez_value = text_rez_value+"Перевірочний код містить не 4 символи. </br>";
		}

	// Загружаємо текст помилок
	$("#reg_error").empty();
	$("#reg_error").append('<div class="alert alert-warning"><p class="message">'+text_rez_value+'</p></div>');
	return rez_value;
	
}

