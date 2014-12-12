<DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Калькулятор на распечатку</title>
</head>
<body onLoad="javascript:window.print()">

<table border="0" align="center" width="700px" ><tr>
<td  align="center" >
<img name='del' src='images/logo.jpg' width="100px" align="left" hspace="25px" ><h1>"ТОЙЧЕС ГРУПП"</h1><h2>Объединение предприятий</h2><h3>www.toyches.ru</h3><br />
</td>
</tr>
</table>
<table  align="center" width="700px" style="border-collapse: collapse; border: 1px solid black;" >
<tr >
<td style="border-collapse: collapse; border: 1px solid black;">Центр иностранных языков «Лингвист»<br />
Образовательный центр «Отличник»<br />
Сеть детских лагерей «Holiday»<br />
Компания «Студия переводов»<br />
</td>
<td style="border-collapse: collapse; border: 1px solid black;" align="right">Российская Федерация<br />
620102, г.Екатеринбург, ул. Ясная, 20<br />
Телефон: (343) 222-22-28<br />
E-mail: info@toyches.ru<br />     
</td>
</tr>
</table>
<br /><br /><br />
<center><h2>РАСЧЕТ СТОИМОСТИ ОБУЧЕНИЯ</h2></center>
<table align="center" bordercolor="#000000" style="border-collapse: collapse; border: 1px solid black;"  width="700px">
<tr>
<?php 

require_once "connect.php";
$a=mysql_query("select * from ".$GLOBALS["table_Traf"]." where id='".$_REQUEST['tarif']."'") or die(mysql_error());
$b=array();
$b=mysql_fetch_assoc($a);
$basic=$b['cost'];
$per=$basic/100;
$newcost=$basic;
echo "<td style='border-collapse: collapse; border: 1px solid black;'><b>".$b['name']."</b><br /><font size=1>Описание: ".$b['description']."</font></td><td style='border-collapse: collapse; border: 1px solid black;' width='70px'><b>".round($b['cost'],0)." руб.</b></td>";
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
<table  align="center" width="700px" style="border-collapse: collapse; border: 1px solid black;">
<tr ><td colspan="3" style="border-collapse: collapse; border: 1px solid black;">Исполнитель</td></tr>
<tr ><td style="border-collapse: collapse; border: 1px solid black;">Фамилия</td><td style="border-collapse: collapse; border: 1px solid black;">Дата </td><td style="border-collapse: collapse; border: 1px solid black;">Подпись</td></tr>
<tr style="vertical-align:middle; text-align:center; line-height:50px"><td style="border-collapse: collapse; border: 1px solid black;"><?php echo $_REQUEST['fioi'] ?></td><td style="border-collapse: collapse; border: 1px solid black;"><?php echo $_REQUEST['date'] ?></td><td style="border-collapse: collapse; border: 1px solid black;">	&nbsp;	&nbsp;	&nbsp;	&nbsp;</td></tr>
<tr ><td colspan="3" style="border-collapse: collapse; border: 1px solid black;">Заказчик</td></tr>
<tr ><td style="border-collapse: collapse; border: 1px solid black;">Фамилия</td><td style="border-collapse: collapse; border: 1px solid black;">Дата </td><td style="border-collapse: collapse; border: 1px solid black;">Подпись</td></tr>
<tr  style="vertical-align:middle; text-align:center; line-height:50px"><td style="border-collapse: collapse; border: 1px solid black;"><?php echo $_REQUEST['fioz'] ?></td><td style="border-collapse: collapse; border: 1px solid black;"><?php echo $_REQUEST['date'] ?></td><td style="border-collapse: collapse; border: 1px solid black;">	&nbsp;	&nbsp;	&nbsp;	&nbsp; </td></tr>
</table><br /><br /><br />
</body>
</html>