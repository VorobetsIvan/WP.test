$(document).ready(function() {
	// Виклик функції загрузки інформації про виноград
	$("#btn_add_comment").bind("click", add_comment);
});

function add_comment(event) {
	// логін
	var login_comment = $("#login_comment").text();
	// Текст коментаря
	var text_comment = $("#text_comment").val();
	// ID поста
	var id_article_comment = $("#id_article_comment").text();

	if (text_comment.length == 0) {
		alert('Введіть повідомлення');
		exit;
	}

	// відправляємо аякс запит
	$.ajax({
		url: "add_comment.php",
		type: "POST",
		data: ({id_article_comment: id_article_comment,login_comment: login_comment, text_comment: text_comment}),
		dataType: "json",
		beforeSend: funcB_add_comment,
		success: funcS_add_comment,
		async: false
	})
	
	// функція до зверенння
	function funcB_add_comment(){

	}

	// функція після зверенння
	function funcS_add_comment(data, d) {
		if(data[1]) {
					 var insert_cod = '<div class="alert alert-info">';
			insert_cod = insert_cod + '<p><b>'+login_comment+'</b></p>';
			insert_cod = insert_cod + '<p class="message">'+text_comment+'</p>';
			insert_cod = insert_cod + '</div>';

			$("#comments").prepend(insert_cod);

			$("#text_comment").val('');
		} else {
			alert('Помилка запису.');
		};
	}



}