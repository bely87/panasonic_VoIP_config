<?php
include "mysql.php";
if (@$_GET[id])
{
mysql_query("UPDATE `nom` SET  `nom` =  '$_GET[nom]',`pass` =  '$_GET[pass]',`server` =  '$_GET[server]' WHERE  `id` ='$_GET[id]' LIMIT 1");
?><meta http-equiv="refresh" content="0; url=index.php">
<?php
}
if (@$_GET[edit])
{
$res = mysql_query("SELECT * FROM  `nom` WHERE  `mak` = '$_GET[edit]'");
while($rows=mysql_fetch_array($res))
{?>
<form method="get" action="">
<input type="HIDDEN" name="id" size="12" maxlength="20"value="<?=$rows[id];?>"/>
Номер<input type="text" name="nom" size="12" maxlength="20"value="<?=$rows[nom];?>"/><br>
Сервер<input type="text" name="server" size="12" maxlength="20" value="<?=$rows[server];?>"><br>
Пароль<input type="text" name="pass" size="12" maxlength="20" value="<?=$rows[pass];?>"><br>
MAK<input type="text" name="mak" size="12" maxlength="20" value="<?=$rows[mak];?>"><br>
  <input type="submit" value="Сохранить">
  </form>
<?php
}
}
?>
