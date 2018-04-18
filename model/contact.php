<?php
$field_address = $_POST['cf_address'];
$field_fio = $_POST['cf_fio'];
$field_count = $_POST['cf_count'];
$field_id = $_POST['cf_id'];

$subject = '=?utf-8?B?'.base64_encode('Тема письма').'?=';

$mail_to = 'email@mail.mail';

$body_message = 'ID книги: '.$field_id."\n";
$body_message .= 'Адрес: '.$field_address."\n";
$body_message .= 'Ф.И.О: '.$field_fio."\n";
$body_message .= 'Количество книг: '.$field_count;

$headers = 'От кого: =?UTF-8?B?' . base64_encode($field_fio) . '?= <=?UTF-8?B?' . base64_encode($field_fio) . "?=>\r\n";
//$headers = 'От кого: '.$field_fio."\r\n";
$headers .= 'Куда отправить: '.$field_address."\r\n";
$headers .= 'Количество книг: '.$field_count."\r\n";
$headers .= 'ID книги: '.$field_id."\r\n";

$mail_status = mail($mail_to, $subject, $body_message, $headers);

$host = $_SERVER['HTTP_HOST'];
$request = $_SERVER['REQUEST_URI'];
$redirect = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$host" . "/bookcat2/index.php?book=";


if ($mail_status) { ?>
	<script language="javascript" type="text/javascript">
		alert('Спасибо за заказ.');
		window.location = '<?php echo $redirect;?><?php echo $field_id; ?>';
	</script>
<?php
}
else { ?>
	<script language="javascript" type="text/javascript">
		alert('Ошибка при отправке формы');
		window.location = '<?php echo $redirect;?><?php echo $field_id; ?>';
	</script>
<?php
}

?>