<?php
$host = "localhost";
$user = "mysql";
$pass = "mysql";
$db   = "addon";
$connect = @mysql_connect($host, $user, $pass);
mysql_query('SET NAMES utf8', $connect);
mysql_select_db($db, $connect);
?>
