    <?php
    $host="localhost";
    $user="admin_1";
    $pass="123456";
    $db_name="admin_1";
    $link=mysql_connect($host,$user,$pass,$db_name);
    mysql_select_db($db_name,$link);
    mysqli_query($link, "SET NAMES 'utf8'");
    mysqli_query($link, "SET CHARACTER SET 'utf8'");
    ?>