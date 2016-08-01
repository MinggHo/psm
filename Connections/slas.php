<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
$hostname_slas = "localhost";
$database_slas = "slas";
$username_slas = "root";
$password_slas = "root";
$dbh = new PDO("mysql:dbname={$database_slas};host={$hostname_slas};port={3306}", $username_slas, $password_slas);
$slas = mysql_pconnect($hostname_slas, $username_slas, $password_slas) or trigger_error(mysql_error(),E_USER_ERROR);
?>
