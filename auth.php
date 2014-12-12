<?php
session_start();
?>
 <?php
 if ((!isset($_SESSION['login']))|| (!isset($_SESSION['pass'])))
 {
 		if ((!isset($_REQUEST['login']))&& (!isset ($_REQUEST['password'])))
		{
		 echo "<!DOCTYPE html PUBLIC \"-\\W3C\\DTD XHTML 1.0 Transitional\\EN\" \"http:\\www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">";
echo "<html xmlns=\"http://www.w3.org/1999/xhtml\">";
echo "<head>";
echo "<meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\" />";
echo "<title>Административная чать Калькулятора (Авторизация)</title>";
echo "</head>";
echo "<body>";
		echo "<div style=\"vertical-align:middle; position:absolute; top:40%; left:50%;width:300px;height:100px;margin-top:-50px; margin-left:-150px;\"><fieldset><legend>Авторизация</legend><form action=\"". $_SERVER['PHP_SELF']."\" method=\"POST\" style=\"vertical-align:middle\"><table align=center valign=middle style=\"vertical-align:middle\"><tr><td width=40%>Ваш логин:</td><td width=60% align=left><input type=\"text\" name=\"login\"></td></tr><tr><td width=40%>Ваш пароль:</td><td width=60% align=left><input type=\"password\" name=\"password\"></td></tr><tr><td width=100% colspan=2 align=center><input type=\"submit\" value=\"Войти\">&nbsp;&nbsp;<input type=\"reset\" value=\"Сбросить\"></td></table></form></fieldset></div></body></html>";exit();
    	}
		else
		{
		 if (isset($_REQUEST['login']) && $_REQUEST['login']==$adm)
	        {
	   if (isset ($_REQUEST['password']) && ($_REQUEST['password']==$ps))
	   
	                {
					$_SESSION['login']=$_REQUEST['login'];
					$_SESSION['pass']=$_REQUEST['password']; 	
					//header("Location:".$_SERVER['PHP_SELF']);
					}
					}
		}
 
 }
 else
 {
  if ((!isset($_SESSION['login']) || $_SESSION['login']!=$adm)||(!isset ($_SESSION['pass'])|| ($_SESSION['pass']!=$ps)))
  {
					echo "bad!</body></html>";exit();
  }
 }
   
		?>