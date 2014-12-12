<!--DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"-->
<!--html xmlns="http://www.w3.org/1999/xhtml"-->
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script language='javascript1.1' type='text/javascript' src='check.js'></script>
<script language="JavaScript1.2">
var newWindow;
function winCalendar()//вызов окошки с календарем
{ 
var date=window.showModalDialog("calendar.htm", "","dialogHeight:250 px; dialogWidth:265 px; resizable:no; center:yes");//открытие окна
document.getElementById("date").value=date;
}; 
</script>
<title>Калькулятор</title>
</head>
<?php
 require_once "connect.php";
$a=mysql_query("select * from ".$GLOBALS["table_Dis"]) or die(mysql_error());
$b=array();
$h=0;
$str=-1;
while (($b=mysql_fetch_assoc($a))!==false)
{

if (isset($_REQUEST['dis']))
{
foreach ( $_REQUEST['dis'] as $k=>$i )
{

if (($i==$b['id'])&&($b['is_one']==0)){$str=$b['id'];}
}
}
 
}
?>

<body onLoad="isOne2(<?php echo $str;?>)">
<center><h2>РАСЧЕТ СТОИМОСТИ ОБУЧЕНИЯ</h2></center>
<form action="print.php" method=\"POST\" name="sel" >
<fieldset>
   <legend>Филиал</legend>
    Центр:<select name="center" onChange="twootpr(false);">
<?php 
$a=mysql_query("select * from ".$GLOBALS["table_Center"]) or die(mysql_error());
$b=array();
$last_id=0;
if (isset($_REQUEST['center']))
{
$idcentr=$_REQUEST['center'];
}
echo "<option  value='-1'>Не выбран</option>";
while (($b=mysql_fetch_assoc($a))!==false)
{
	if (($b['id']=='7')||($b['id']=='8'))continue;
	if ($idcentr==$b['id'])
	{
		echo "<option  value=".$b['id']." selected >".$b['title']."</option>";
	}
	else
	{
		echo "<option  value=".$b['id']." >".$b['title']."</option>";
	}
}
?>
</select><br />
</fieldset>
<fieldset>
   <legend>Тарифы</legend>
<select name="tarif">
<?php 
if (isset($_REQUEST['center']))
{
$id=$_REQUEST['center'];
 require_once "connect.php";
$a=mysql_query("select * from ".$GLOBALS["table_Traf"]." where branch='".$id."' or branch='0' order by name") or die(mysql_error());
$b=array();
while (($b=mysql_fetch_assoc($a))!==false)
{
if (isset($_REQUEST['tarif'])) 
{

if ($_REQUEST['tarif']==$b['id']) {echo "<option  value=".$b['id']." selected>".$b['name']."</option>";}
else
{
echo "<option  value=".$b['id']." >".$b['name']."</option>";
}

}else
{
echo "<option  value=".$b['id']." >".$b['name']."</option>";
}

}
}
?>
  </select><br /> </fieldset>
<fieldset>
   <legend>Тарифные опции</legend>
  


<?php 
if (isset($_REQUEST['center']))
{
$id=$_REQUEST['center'];
$a=mysql_query("select * from ".$GLOBALS["table_Dis"]." where isoption=0 and (branch='".$id."' or branch='0')") or die(mysql_error());
$b=array();
$h=0;
while (($b=mysql_fetch_assoc($a))!==false)
{
$str="";
if (isset($_REQUEST['dis']))
{
foreach ( $_REQUEST['dis'] as $i )
{
if ($i==$b['id']){$str=" checked ";}

}
} 

	  $t0=strtotime($b['date_begin']);
	  $t1=strtotime($b['date_end']);
	  $now=time();
	  
	  if (!(($b['date_begin']=="0000-00-00")&&($b['date_end']=="0000-00-00")))
	  {
	  if (!(($t0<=$now)&&($now<=$t1)))continue;
	  }
	 
$r="";
if ($b['is_one']==0){$r="<b style='color: red'>*</b>";}
echo $b['name']." ".$r.": <input type=\"checkbox\" name=dis[] id=".$h."  value=".$b['id']." class='".$b['is_one']."'  onClick='isOne(".$h.")' $str><br>";
$h++;
}
}
?>
   </fieldset>
   
   <fieldset>
   <legend>Акции</legend>
<?php 
if (isset($_REQUEST['center']))
{
$id=$_REQUEST['center'];
$a=mysql_query("select * from ".$GLOBALS["table_Dis"]." where isoption=1 and (branch='".$id."' or branch='0')") or die(mysql_error());
$b=array();
while (($b=mysql_fetch_assoc($a))!==false)
{
$str="";
if (isset($_REQUEST['dis']))
{
foreach ( $_REQUEST['dis'] as $i )
{
if ($i==$b['id']){$str=" checked ";}
}
} 
	  $t0=strtotime($b['date_begin']);
	  $t1=strtotime($b['date_end']);
	  $now=time();
	  
	  if (!(($b['date_begin']=="0000-00-00")&&($b['date_end']=="0000-00-00")))
	  {
	  if (!(($t0<=$now)&&($now<=$t1)))continue;
	  }
$r="";
if ($b['is_one']==0){$r="<b style='color: red'>*</b>";}
echo $b['name']." ".$r.": <input type=\"checkbox\" name=dis[] id=".$h."  value=".$b['id']." class='".$b['is_one']."'  onClick='isOne(".$h.")' ".$str."><br>";
$h++;
}
}
?>
   </fieldset>
   
   <fieldset>
   <legend>ФИО</legend>

</select><br />
    ФИО исполнителя<select name="fioi" onChange="this.submit();">
<?php 
if (isset($_REQUEST['center']))
{
$id=$_REQUEST['center'];
$a=mysql_query("select * from ".$GLOBALS["table_Admin"]." where center_id='".$id."' AND active='1'") or die(mysql_error());
$b=array();
while (($b=mysql_fetch_assoc($a))!==false)
{
echo "<option  value='".$b['name']."' >".$b['name']."</option>";
}

}

?>
</select><br />
<!--input type="text" name="fioi" value="<?php if (isset($_REQUEST['fioi'])){echo $_REQUEST['fioi'];}?>" maxlength="90" height="150px"   /-->
ФИО заказчика: <input type="text" name="fioz" value="<?php if (isset($_REQUEST['fioi'])){echo $_REQUEST['fioz'];}?>"   maxlength="90" height="150px"  />
   </fieldset>
    <fieldset>
   <legend>Даты</legend>
Дата договора: <input type="text" name="date" id="date" value="<?php if (isset($_REQUEST['date'])){echo $_REQUEST['date'];}?>" maxlength="90" height="150px" /><input type="button" name="Go" id="Go" value="Календарь" onClick="winCalendar()"><!--кнопка вызова календаря-->
   </fieldset>
	<input type="submit" name="calc" value="Вычислить" onClick="twootpr(false)">
	<input type="submit" name="done" value="Распечатать"  onClick="twootpr(true)">
	<input type="reset" value="Сбросить"><br>
</form>
<b style='color: red'>*</b> - не суммирующая акция или скидка
<?php 
if (isset($_REQUEST['calc']))
{

?>
<hr />
<center><h2>РЕЗУЛЬТАТ</h2></center>
<table align="center" bordercolor="#000000" style="border-collapse: collapse; border: 1px solid black;" width="700px">
<tr >
<?php 

require_once "connect.php";
$a=mysql_query("select * from ".$GLOBALS["table_Traf"]." where id='".$_REQUEST['tarif']."'") or die(mysql_error());
$b=array();
$b=mysql_fetch_assoc($a);
$basic=$b['cost'];
$per=$basic/100;
$newcost=$basic;
echo "<td style='border-collapse: collapse; border: 1px solid black;'><b>".$b['name']."</b><br /><font size=1>Описание: ".$b['description']."</font></td><td style='border-collapse: collapse; border: 1px solid black;'  width='70px'><b>".round($b['cost'],0)." руб.</b></td>";
?>
</tr>

<?php
$p=0;
$c=0;
if (isset($_REQUEST['dis']))
{
$str1="<tr><td style='border-collapse: collapse; border: 1px solid black;' colspan=2><b>Тарифные опции</b></td></tr>";
$str2="<tr><td style='border-collapse: collapse; border: 1px solid black;' colspan=2><b>Акции</b></td></tr>";
foreach ( $_REQUEST['dis'] as $i )
{
$a2=mysql_query("select * from ".$GLOBALS["table_Dis"]." where id='".$i."'") or die(mysql_error());
$b2=array();
$b2=mysql_fetch_assoc($a2);
if ($b2['isoption']==0){

if ($b2['interest']!=0)
{
$p+=$b2['interest'];
$str1.="<tr><td style='border-collapse: collapse; border: 1px solid black;'><i>".$b2['name']."</i><br /><font size=1>Описание: ".$b2['description']."</font></td><td  style='border-collapse: collapse; border: 1px solid black;'>".$b2['interest']." %</td></tr>";
}
if ($b2['cost']!=0)
{
$c+=$b2['cost'];
$str1.="<tr><td  style='border-collapse: collapse; border: 1px solid black;'><i>".$b2['name']."</i><br /><font size=1>Описание: ".$b2['description']."</font></td><td  style='border-collapse: collapse; border: 1px solid black;'>".round($b2['cost'],0)." руб.</td></tr>";
}
}
if ($b2['isoption']==1){


if ($b2['interest']!=0)
{
$p+=$b2['interest'];
$str2.="<tr><td style='border-collapse: collapse; border: 1px solid black;'><i>".$b2['name']."</i><br /><font size=1>Описание: ".$b2['description']."</font></td><td  style='border-collapse: collapse; border: 1px solid black;'>".$b2['interest']." %</td></tr>";
}
if ($b2['cost']!=0)
{
$c+=$b2['cost'];
$str2.="<tr><td  style='border-collapse: collapse; border: 1px solid black;'><i>".$b2['name']."</i><br /><font size=1>Описание: ".$b2['description']."</font></td><td  style='border-collapse: collapse; border: 1px solid black;'>".round($b2['cost'],0)." руб.</td></tr>";
}
}



}echo $str1.$str2;
}

$newcost-=($per*$p);
$newcost-=$c;
echo "<tr><td  style='border-collapse: collapse; border: 1px solid black;'><b>Итого:</b></td><td  style='border-collapse: collapse; border: 1px solid black;'><b>".round($newcost,0)."  руб.</b></td></tr>";
?>
</table><br /><br /><br />
<?php 
}
?>
</body>
</html>
