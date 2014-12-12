<?php
require_once "connect.php";
require_once "auth.php";
require_once "lib.php";
?>
 <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Административная чать Калькулятора</title>
<script language='javascript1.1' type='text/javascript' src='check.js'></script>
<script language="JavaScript1.2">
var newWindow;
function winCalendar(dat)//вызов окошки с календарем
{ 
var date=window.showModalDialog("calendar.htm", "","dialogHeight:250 px; dialogWidth:265 px; resizable:no; center:yes");//открытие окна
document.getElementById(dat).value=date;
}; 
</script>
</head>
<body><table width="100%">
<tr>
<td width="200px">
<a href="<?php echo $_SERVER['PHP_SELF']?>"><img name='del' src='images/calc.jpg' width="150px"></a>
</td>
<td align="center" >
<h1>Калькулятор</h1>
</td></tr>
<tr><td valign="top">
<a href="<?php echo $_SERVER['PHP_SELF']?>?section=traf">Тарифы</a><br />
<a href="<?php echo $_SERVER['PHP_SELF']?>?section=dis">Тарифные опции</a><br />
<a href="<?php echo $_SERVER['PHP_SELF']?>?section=akc">Акции</a><br />
<a href="<?php echo $_SERVER['PHP_SELF']?>?section=exit">Выйти</a><br />
</td>
<td>
<?php


if (isset($_REQUEST['section']) )
{
	$sec=$_REQUEST['section'];
	if (isset($_REQUEST['action']) )
	{
		$act=$_REQUEST['action'];
	if ($sec=="traf")
	{
			if ($act=="add") {
				if (isset($_REQUEST['done']) ){echo addTraf();}else{echo addTrafForm();}
			}
		
		if ($act=="delall") {echo delAllTraf();} 
	
		if ($act=="delid") {echo delIdTraf();}
	
		if (isset($_REQUEST['id']) )
	    {
			$id=$_REQUEST['id'];
			if ($act=="del") {echo delTraf($id);}
			
			if ($act=="copy"){
			 if (isset($_REQUEST['done']) ){echo copyTraf();}else{echo copyTrafForm($id);}
			}
			if ($act=="change"){
			 if (isset($_REQUEST['done']) ){echo changeTraf();}else{echo changeTrafForm($id);}
			}
		}
	 }
	 if ($sec=="dis")
	{
			if ($act=="add") {
				if (isset($_REQUEST['done']) ){echo addDis();}else{echo addDisForm();}
			}
				if ($act=="delid") {echo delIdDis();}
		if ($act=="delall") {echo delAllDis();} 
		if (isset($_REQUEST['id']) )
	    {
			$id=$_REQUEST['id'];
			if ($act=="del") {echo delDis($id);}
			if ($act=="copy"){
			 if (isset($_REQUEST['done']) ){echo copyDis();}else{echo copyDisForm($id);}
			}
			if ($act=="change") { if (isset($_REQUEST['done']) ){echo changeDis();}else{echo changeDisForm($id);}}
		}
	 }
	 if ($sec=="akc")
	{
			if ($act=="add") {
				if (isset($_REQUEST['done']) ){echo addAkc();}else{echo addAkcForm();}
			}
				if ($act=="delid") {echo delIdAkc();}
		if ($act=="delall") {echo delAkcDis();} 
		if (isset($_REQUEST['id']) )
	    {
			$id=$_REQUEST['id'];
			if ($act=="del") {echo delAkc($id);}
			if ($act=="copy"){
			 if (isset($_REQUEST['done']) ){echo copyAkc();}else{echo copyAkcForm($id);}
			}
			if ($act=="change") { if (isset($_REQUEST['done']) ){echo changeAkc();}else{echo changeAkcForm($id);}}
		}
	 }
	}
	else
	{	
		if ($sec=="traf") {	echo selectTraf();}
		if ($sec=="dis") {echo selectDisc();}
		if ($sec=="akc") {echo selectAkc();}
		if ($sec=="exit") {LogOut();} 
	}
	

}


  ?>
</td></tr>
</table></body></html>
  
  

