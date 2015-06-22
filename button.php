<a href="?add=ok&button=<?=$_GET[button];?>">Добавить функцию</a>
<br>
<?php
include "mysql.php";
$button=$_GET[button];
if ($_GET[del]=="ok")
{
mysql_query("DELETE FROM `button`  WHERE  `id` = $_GET[id]");

}
if (@$_GET[par1]&&@$_GET[par2]&&@$_GET[par4]){
mysql_query("INSERT INTO  `button` (`id` ,`mak` ,`par1` ,`par2` ,`par3` ,`par4`)VALUES (NULL ,  '$_GET[button]',  '$_GET[par1]',  '$_GET[par2]',  '$_GET[par3]',  '$_GET[par4]')");

}

if (@$_GET[add]){?>
<form method="get" action="">
<input type="HIDDEN" name="button" size="12" maxlength="20"value="<?=$_GET[button];?>"/>
Параметр функции<select name="par1">
<option value="X_PANASONIC_IPTEL_ONETOUCH">Быстрый набор</option>
<option value="X_PANASONIC_IPTEL_DN">Статус линии</option>
<option value="X_PANASONIC_IPTEL_CONTACT">CONTACT</option>
<option value="X_PANASONIC_IPTEL_ACD">ACD</option><
<option value="X_PANASONIC_IPTEL_HEADSET">HEADSET</option></select>
<br>
Значение<input type="text" name="par2" size="12" maxlength="20" value=""><br>
Название функции<input type="text" name="par4" size="12" maxlength="20" value=""><br>
<input type="submit" value="Отправить">
</form>
<?php
}
$res = mysql_query("SELECT * FROM  `button`  WHERE  `mak` = '$_GET[button]'");
while($rows=mysql_fetch_array($res))
{?>
<?=$rows[par1];?> -
<?=$rows[par2];?> -
<?=$rows[par3];?> -
<?=$rows[par4];?>  -.
<a href="?del=ok&button=<?=$_GET[button];?>&id=<?=$rows[id];?>">Удалить</a> <br>


<?php }

?>
