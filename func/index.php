<!doctype html>
<html lang="ru">
<head>
<title>Админ-панель - добавить тег</title>
<meta charset="UTF-8">
<meta name="description" content="hashtags">
<meta name="author" content="HashTags">
<link rel="shortcut icon" href="icon.ico">
<link href="link.css" rel="stylesheet">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<!-- Подключаемся к БД -->
<?php
    require_once("config.php");
?>
<!-- Запись в базу -->
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
<div class="form-group">
<form action="" method="post">
<!-- Пишем тег -->
    <input type="text" name="tag" class="form-control" placeholder="#love" value="<? echo $resh; ?>">
<!-- Выбор категории -->
    <select name="category" multiple class="form-control">                                                
        <?php $r=mysql_query("select * from category_description"); 
            for ($i=0; $i<mysql_num_rows($r); $i++) 
                { 
                    $f=mysql_fetch_array($r); 
                echo "<option value=$f[category_id]>$f[name]</option>"; 
            } 
        ?>
    </select>
<!-- Выбор языка -->
    <select name="lang" class="form-control">
        <?php $lang=mysql_query("select * from language"); 

        for ($q=0; $q<mysql_num_rows($lang); $q++) 
        { 

            $lang_id=mysql_fetch_array($lang); 
            echo "<option value=$lang_id[lang_id]>$lang_id[name]</option>"; 
        } 
        ?>
    </select>
<!-- Комментарий -->
    <input type="text" name="comments" class="form-control" placeholder="Comments">
<!-- Добавить -->
    <center><input type="submit" class="btn btn-success btn-anim" value="Add Hashtag in DB"></center>
</form>
</div>	
</table>

<?php
//Получаем данные
$sql = mysql_query('SELECT `id`, `tag`, `category` FROM `tags` ORDER BY `tags`.`id` DESC');
while ($result = mysql_fetch_array($sql)) {
    echo "ID:".$result['id']." ".$result['tag']." | ".$result['category']." - <a href='?del=".$result['id']."'>Удалить</a><br>";
}
?>
<?php
//Удаляем, если что
if (isset($_GET['del'])) {
    $sql = mysql_query('DELETE FROM `tags` WHERE `id` = "'.$_GET['del'].'"');
    if ($sql) {
        echo "<p>Tag удален.</p>";
    } else {
        echo "<p>Произошла ошибка.</p>";
    }
}

while ($result = mysql_fetch_array($sql)) {
    echo $result['id'].") ".$result['tag']." - <a href='?del=".$result['id']."'>Удалить</a><br>";
}
    $delOk = filter_input( INPUT_GET, 'del');
if( $delOk){
    // что-то сделали с данными, записали в БД
    header('Location: /');
    exit();
}
?>
<form action="" method="post">
    <input type="hidden" name="del" value='?del=".$result['id']."'>
    <button type="button" class="btn btn-danger">Del</button>
</form>
<h1>Workout</h1>
<?php
$sql = mysql_query('SELECT `tag` FROM `tags` WHERE `category` LIKE \'workout\' ORDER BY `category` ASC');
while ($result = mysql_fetch_array($sql)) {
    echo $result['tag']." ";
}
?>
</body>