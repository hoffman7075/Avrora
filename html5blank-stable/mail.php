<?php 

$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
$headers .= "From: ".$_SERVER['SERVER_NAME']." \r\n"; 

if (($_POST["checkin"] != null) && ($_POST["room"] != null)) {
    mail('74-avrora@mail.ru','Письмо по сайту avrora74.ru от ' . $_POST['name'],'Имя: ' . $_POST['name'] . '<br><br>Телефон: ' . $_POST['telephone'] . '<br><br>Зал: ' . $_POST['room'] . '<br><br> Дата: ' . $_POST['checkin'],$headers);
    echo 'send_room';
}
else {
    mail('74-avrora@mail.ru','Письмо по сайту avrora74.ru от ' . $_POST['name'],'Имя: ' . $_POST['name'] . ' ' . $_POST['surname'] . '<br><br>Email: ' . $_POST['email'] . '<br><br>Телефон: ' . $_POST['telephone'] . '<br><br>Сообщение: ' . $_POST['message'],$headers);
    echo 'send_contact';
}

?>