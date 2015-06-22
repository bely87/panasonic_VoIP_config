<?php
include "mysql.php";
$res = mysql_query("SELECT * FROM  `nom`");
while($rows=mysql_fetch_array($res))
{
echo strtolower($rows[mak])."<br>";
}
?>
