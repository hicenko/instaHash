<!doctype html>
<html lang="ru">
<head>
<title>Админ-панель - добавить категорию</title>
<meta charset="UTF-8">
<meta name="description" content="hashtags">
<meta name="author" content="HashTags">
<link rel="shortcut icon" href="icon.ico">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<?php
require_once("config.php");
//Если переменная tag передана
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

<form class="form-horizontal" method="post">
  <div class="form-group form-group-lg">
    <label class="col-sm-2 control-label" for="formGroupInputLarge">Название категории: </label>
    <div class="col-sm-10">
      <input name="name" class="form-control" type="text" id="formGroupInputLarge" placeholder="Введите название категории">
    </div>
  </div>
    <div class="form-group form-group-sm">
    <label class="col-sm-2 control-label" for="formGroupInputSmall">SEO тайтл</label>
    <div class="col-sm-10">
      <input name="meta_title" class="form-control" type="text" id="formGroupInputSmall" placeholder="Лучшие теги в категории * бесплатно!">
    </div>
  </div>
<input name="description" type="text" class="form-control" row="2" placeholder="Описание категории">
<input name="meta_description" type="text" class="form-control" rows="2" placeholder="SEO Описание категории">
													<select name="lang_id" class="form-control">
													    <option value="1">Eng</option>
														<option value="2">Rus</option>
													</select>
													<center><input type="submit" class="btn btn-success btn-anim" value="Add Category in DB"></center>

<?php
//Получаем данные
$sql = mysql_query('SELECT `name`, `description`, `category_id` FROM `category_description` ORDER BY `category_description`.`category_id` DESC');
while ($result = mysql_fetch_array($sql)) {
    echo "ID:".$result['category_id']." ".$result['name']." | ".$result['description']." - <a href='?del=".$result['category_id']."'>Удалить</a><br>";
}
?>
<?php
//Удаляем, если что
if (isset($_GET['del'])) {
    $sql = mysql_query('DELETE FROM `category_description` WHERE `category_id` = "'.$_GET['del'].'"');
    if ($sql) {
        echo "<p>Категория удалена.</p>";
    } else {
        echo "<p>Произошла ошибка.</p>";
    }
}

while ($result = mysql_fetch_array($sql)) {
    echo $result['category_id'].") ".$result['name']." - <a href='?del=".$result['category_id']."'>Удалить</a><br>";
}
    $delOk = filter_input( INPUT_GET, 'del');
if( $delOk){
    // что-то сделали с данными, записали в БД
    header('Location: /');
    exit();
}
?>

<h1>Workout</h1>
<div id="copyTarget">
<?php
$sql = mysql_query('SELECT `tag` FROM `tags` WHERE `category` LIKE \'7\' ORDER BY `category` ASC');
while ($result = mysql_fetch_array($sql)) {
    echo $result['tag']." ";
}
?>
</div>

<button id="copyButton">Copy Cloud Hashtag</button>
<br><br>
<script type="text/javascript">
document.getElementById("copyButton").addEventListener("click", function() {
    copyToClipboard(document.getElementById("copyTarget"));
});

function copyToClipboard(elem) {
      // create hidden text element, if it doesn't already exist
    var targetId = "_hiddenCopyText_";
    var isInput = elem.tagName === "INPUT" || elem.tagName === "TEXTAREA";
    var origSelectionStart, origSelectionEnd;
    if (isInput) {
        // can just use the original source element for the selection and copy
        target = elem;
        origSelectionStart = elem.selectionStart;
        origSelectionEnd = elem.selectionEnd;
    } else {
        // must use a temporary form element for the selection and copy
        target = document.getElementById(targetId);
        if (!target) {
            var target = document.createElement("textarea");
            target.style.position = "absolute";
            target.style.left = "-9999px";
            target.style.top = "0";
            target.id = targetId;
            document.body.appendChild(target);
        }
        target.textContent = elem.textContent;
    }
    // select the content
    var currentFocus = document.activeElement;
    target.focus();
    target.setSelectionRange(0, target.value.length);
    
    // copy the selection
    var succeed;
    try {
          succeed = document.execCommand("copy");
    } catch(e) {
        succeed = false;
    }
    // restore original focus
    if (currentFocus && typeof currentFocus.focus === "function") {
        currentFocus.focus();
    }
    
    if (isInput) {
        // restore prior selection
        elem.setSelectionRange(origSelectionStart, origSelectionEnd);
    } else {
        // clear temporary content
        target.textContent = "";
    }
    return succeed;
}
</script>>
</body>