<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?
@mysql_connect("localhost","root","root") or die("No User And Password");
@mysql_select_db("news") or die("No Database");
@mysql_query("SET NAMES utf8");
?>