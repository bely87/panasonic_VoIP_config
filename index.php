<?php
include "mysql.php";
if (@$_GET[del])
{
mysql_query("DELETE FROM `nom`  WHERE  `id` = $_GET[del]");
}
if (@$_GET[mak])
{
$mak=$_GET[mak];
$server=$_GET[server];
$pass=$_GET[pass];
$nom=$_GET[nom];
mysql_query("INSERT INTO  `nom` (`id` ,`nom` ,`pass` ,`server` ,`mak`)VALUES (NULL ,  '$nom',  '$pass',  '$server', '$mak')");
print $_GET[mak];
}
if (!$_GET[id])
{
?>
<form method="get" action="">
Номер<input type="text" name="nom" size="12" maxlength="20"/><br>
Сервер<input type="text" name="server" size="12" maxlength="20" value="192.168.0.2"><br>
Пароль<input type="text" name="pass" size="12" maxlength="20" value="1234567890411"><br>
MAK<input type="text" name="mak" size="12" maxlength="20"><br>
  <input type="submit" value="Отправить">
</form><table cellspacing="0" border="1">
<?php
$res = mysql_query("SELECT * FROM  `nom`");
while($rows=mysql_fetch_array($res))
{?>
 <tr>
 <td><?=$rows[id];?></td>
 <td><?=$rows[nom];?></td>
 <td><?=$rows[pass];?></td>
 <td><?=$rows[server];?></td>
 <td><a href=edit.php?edit=<?=$rows[mak];?>><?=$rows[mak];?></a></td>
 <td><a href=?del=<?=$rows[id];?>>X</a></td>
  <td><a href=button.php?button=<?=$rows[mak];?>>доп кнопки</a></td>
 </tr>
<?php
}?></table>
<?php
}else{
$res = mysql_query("SELECT * FROM  `nom` WHERE  `mak` = '$_GET[id]'");
while($rows=mysql_fetch_array($res))
{
?>
# Panasonic SIP Phone Standard Format File # DO NOT CHANGE THIS LINE!

############################################################
# Line Settings #
############################################################
## Call Control Settings
RETURN_VOL_SET_DEFAULT_ENABLE="N"
FLASH_RECALL_TERMINATE="Y"
FLASHHOOK_CONTENT_TYPE="Signal"
VOICE_MESSAGE_AVAILABLE="Y"

## SIP Settings
SIP_USER_AGENT="Panasonic_{MODEL}/{fwver} ({mac})"
SIP_RESPONSE_CODE_DND="403"
SIP_RESPONSE_CODE_CALL_REJECT="603"

#----------------------------------------------------------#
# Setting for line 1 #
#----------------------------------------------------------#


## SIP Settings
PHONE_NUMBER_1="<?=$rows[nom];?>"
SIP_URI_1=""
LINE_ENABLE_1="Enabled"
PROFILE_ENABLE_1="Enabled"
SIP_AUTHID_1="<?=$rows[nom];?>"
SIP_PASS_1="<?=$rows[pass];?>"
SIP_SRC_PORT_1="5060"
SIP_PRXY_ADDR_1="<?=$rows[server];?>"
SIP_PRXY_PORT_1="5060"
SIP_RGSTR_ADDR_1="<?=$rows[server];?>"
SIP_RGSTR_PORT_1="5060"
SIP_SVCDOMAIN_1=""
REG_EXPIRE_TIME_1="3600"
REG_INTERVAL_RATE_1="90"
SIP_SESSION_TIME_1="0"
SIP_SESSION_METHOD_1="0"
DSCP_SIP_1="0"
SIP_2NDPROXY_ADDR_1=""
SIP_2NDPROXY_PORT_1="5060"
SIP_2NDRGSTR_ADDR_1=""
SIP_2NDRGSTR_PORT_1="5060"
SIP_TIMER_T1_1="500"
SIP_TIMER_T2_1="4"
SIP_TIMER_T4_1="0"
SIP_FOVR_NORSP_1="Y"
SIP_FOVR_MAX_1="4"
SIP_REFRESHER_1="0"
SIP_DNSSRV_ENA_1="Y"
SIP_UDP_SRV_PREFIX_1="_sip._udp."
SIP_TCP_SRV_PREFIX_1="_sip._tcp."
SIP_100REL_ENABLE_1="N"
SIP_INVITE_EXPIRE_1="0"
SIP_18X_RTX_INTVL_1="0"
SIP_PRSNC_ADDR_1=""
SIP_PRSNC_PORT_1="5060"
SIP_2NDPRSNC_ADDR_1=""
SIP_2NDPRSNC_PORT_1="5060"
USE_DEL_REG_OPEN_1="N"
USE_DEL_REG_CLOSE_1="N"
PORT_PUNCH_INTVL_1="0"
SIP_REQURI_PORT_1="Y"
SIP_ADD_RPORT_1="N"
SIP_SUBS_EXPIRE_1="3600"
SUB_RTX_INTVL_1="10"
REG_RTX_INTVL_1="10"
SIP_P_PREFERRED_ID_1="N"
SIP_PRIVACY_1="N"
ADD_USER_PHONE_1="N"
SDP_USER_ID_1="-"
SUB_INTERVAL_RATE_1="90"
SIP_OUTPROXY_ADDR_1=""
SIP_OUTPROXY_PORT_1="5060"
SIP_TRANSPORT_1="0"
SIP_ANM_DISPNAME_1="1"
SIP_ANM_USERNAME_1="0"
SIP_ANM_HOSTNAME_1="N"
SIP_DETECT_SSAF_1="N"
SIP_CONTACT_ON_ACK_1="N"
SIP_TIMER_B_1="32000"
SIP_TIMER_D_1="5000"
SIP_TIMER_F_1="32000"
SIP_TIMER_H_1="32000"
SIP_TIMER_J_1="5000"
ADD_TRANSPORT_UDP_1="N"
ADD_EXPIRES_HEADER_1="Y"
SIP_HOLD_HOLDRECEIVE_1="Y"
SIP_ADD_DIVERSION_1="1"

############################################################
# Telephone Settings #
############################################################


## Flexible Button Settings

<?php $i=1;
$resq = mysql_query("SELECT * FROM  `button` WHERE  `mak` = '$_GET[id]'");
while($rowsq=mysql_fetch_array($resq))
{ ?>
FLEX_BUTTON_FACILITY_ACT<?=$i;?>="<?=$rowsq[par1]?>"
FLEX_BUTTON_FACILITY_ARG<?=$i;?>="<?=$rowsq[par2]?>"
FLEX_BUTTON_QUICK_DIAL<?=$i;?>="<?=$rowsq[par3]?>"
FLEX_BUTTON_LABEL<?=$i;?>="<?=$rowsq[par4]?>"
<?php $i++;
}

}}
?>
