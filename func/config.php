    <?php
    $host="88.99.232.203:3320";
    $user="instaHash";
    $pass="PassInstaHash1";
    $db_name="instaHash";
    $link=mysql_connect($host,$user,$pass,$db_name);
    mysql_select_db($db_name,$link);
    mysqli_query($link, "SET NAMES 'utf8'");
    mysqli_query($link, "SET CHARACTER SET 'utf8'");
    ?>