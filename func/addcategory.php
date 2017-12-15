<?php
if (isset($_POST["name"])) {
    //Вставляем данные, подставляя их в запрос
    $sql = mysql_query("INSERT INTO `category_description` (`name`, `description`, `lang_id`, `meta_description`, `meta_title`, `meta_keyword`) 
                        VALUES ('".$_POST['name']."','".$_POST['description']."','".$_POST['lang_id']."','".$_POST['meta_description']."','".$_POST['meta_title']."','".$_POST['meta_keyword']."')");
    //Если вставка прошла успешно
    if ($sql) {
        echo "<p>Категория успешно добавлена в базу.</p>";
    } else {
        echo "<p>Произошла ошибка.</p>";
    }
}
?>