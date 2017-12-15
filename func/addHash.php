<?php
//Если переменная tag передана
if (isset($_POST["tag"])) {
    //Вставляем данные, подставляя их в запрос
    $sql = mysql_query("INSERT INTO `tags` (`tag`, `category`, `comments`, lang) 
                        VALUES ('".$_POST['tag']."','".$_POST['category']."','".$_POST['comments']."','".$_POST['lang']."')");
    //Если вставка прошла успешно
    if ($sql) {
        echo "<p>Данные успешно добавлены в таблицу.</p>";
    } else {
        echo "<p>Произошла ошибка.</p>";
    }
}
?>
<table>
<? $resh = '#' ?>
<? $defCategory = 'Выберите категорию' ?>