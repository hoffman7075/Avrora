<?php  /* Template Name: Отправка формы */

$headers  = "Content-type: text/html; charset=utf-8 \r\n"; 
$headers .= "From: <admin@avrora.start-go.pro>\r\n"; 

if (isset($_POST["checkin"] && isset($_POST["room"]))) {
    mail('74-avrora@mail.ru','Письмо по сайту avrora74.ru от ' . $_POST['name'],$_POST['name'] . '<br><br>' . $_POST['telephone'] . '<br><br>' . $_POST['room'] . '<br><br>' . $_POST['checkin'],$headers);
}
else {
    mail('74-avrora@mail.ru','Письмо по сайту avrora74.ru от ' . $_POST['name'],$_POST['name'] . $_POST['surname'] . '<br><br>' . $_POST['email'] . '<br><br>' . $_POST['telephone'] . '<br><br>' . $_POST['message'],$headers);
}

?>