<? 
$connect_host        = "localhost";
$connect_id        = "DB아이디";
$connect_pass        = "DB비밀번호";
$connect_db        = "DB네임";
$connect_table        = "원하는테이블네임";
$xls_filename        = "filename.xls";

$connect=@mysql_connect($connect_host,$connect_id,$connect_pass);
$mysql=@mysql_select_db($connect_db,$connect);

header("Content-Type: application/vnd.ms-excel"); 
header("Content-Disposition: attachment; filename=$xls_filename"); 
?> 

<html> 
<head> 
<meta http-equiv=Content-Type content=text/html; charset=EUC-KR>
</head> 
<body> 
<table border=1>
<tr align=center>
<?
$fields = mysql_list_fields("$connect_db", "$connect_table");
$columns = mysql_num_fields($fields);

for ($i = 0; $i < $columns; $i++) {
$field[$i]=mysql_field_name($fields, $i);
  echo "<th>".$field[$i]. "</th>";
}
?>
</tr>

<?
$result=mysql_query("select * from $connect_table");
while($data=mysql_fetch_assoc($result)){
echo"<tr>";

for ($i = 0; $i < sizeof($field); $i++) {
echo "<td>".$data["$field[$i]"]."</td>";
}

echo"</tr>";
}
?>
</table>
</body> 
</html> 
