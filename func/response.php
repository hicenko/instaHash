<?php
include_once("config.php");
$select = mysql_select_db(admin_1);
// проверяем, что нам ввёл юзер, если ничего не ввёл - по ушам ему и пусть опять вводит
 
    $name = $_POST ['text1'];
    $password = $_POST ['text2'];
    $mail = $_POST ['text3'];
 
if (!empty($name) && !empty($password) && !empty($mail))
{
// всё ок, добавляем  в базу и выводим уведомление
$operation = mysql_query("INSERT INTO $tags VALUES ('$tag', '$category', '$comments')") or die("в процессе добавления произошла ошибка, пожалуйста, попробуйте снова");
 
echo "Добавлено.";
}
 
else
echo 'Вы попали на страницу из неверного источника или указаны не все данные. Пожалуйста, <a href="javascript:history.go(-1)">вернитесь</a> и попробуйте снова.';
 
// Закрываем соединение с бд
mysql_close($connect);
?>


