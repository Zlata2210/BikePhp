<?php session_start();
function connectBD()
{
	$host = 'localhost'; // адрес сервера
	$database = 'site'; // имя базы данных
	$user = 'root'; // имя пользователя
	$password = ''; // пароль
	$link = mysqli_connect($host, $user, $password, $database)
    or die("Ошибка " . mysqli_error($link));
		return $link;
}
function get_user($login,$pass)
{
  $link=connectBD();
  $query=mysqli_query($link, " select * from users where user='$login' AND password='$pass'");
  $res = mysqli_num_rows($query);
  if ($res==1) { return true;
  }
  else  { unset($_SESSION['login'],$_SESSION['password']); return false;}
}
function get_table($que,$name)
{

  $link = connectBD();
	$query = mysqli_query($link,$que);
	$str ="<table border='2px'>
  <tr>
  <td>id</td><td>Img</td> <td> NameMoto </td> <td> Characters </td> <td> Cost </td>
  </tr>
  ";
  $id=0;
  while ($x = mysqli_fetch_assoc($query)){
    $id = $id+1;

	 $str.="<tr >";
   $str.="<td><form  method='post' action='but.php'><textarea  rows='1' cols='1' name='".$name.$id."'>"; $str.=$x['id'];
   $str.="</textarea><p><input type='submit' name='del".$name."' value='Del'> </form></td>";
	 $str.="<td width='150px' height='150px'>";
   $str.="<img src='images/"; $str.=$x['images']; $str.=".jpg' width='100px' height='100px'>";
	 if ($name=='cros') {
		 $str.="
		 <form enctype='multipart/form-data' method='post' action='uploading.php'>
	 	<input type='file' name='img'><br>
	 	<input type='submit' value='Загрузить' name='cros".$id."'>
	 </form>";
	 }
	 if ($name=='road') {
		 $str.="
		 <form enctype='multipart/form-data' method='post' action='uploading.php'>
	 	<input type='file' name='img'><br>
	 	<input type='submit' value='Загрузить' name='road".$id."'>
	 </form>";
	 }
	 if ($name=='sport') {
		 $str.="
		 <form enctype='multipart/form-data' method='post' action='uploading.php'>
	 	<input type='file' name='img'><br>
	 	<input type='submit' value='Загрузить' name='sport".$id."'>
	 </form>";
	 }


   $str.="</td>";
	  $str.="<td><form  method='post' action='but.php'><textarea name='content-name".$id."'>"; $str.=$x['name'];
    $str.="</textarea><p><input type='submit' name='savename".$name."' value='Save'> </form></td>";
		$str.="<td><form  method='post' action='but.php'><textarea name='content-char".$id."'>";  $str.=$x['characters'];
    $str.="</textarea><p><input type='submit' name='savechar".$name."' value='Save'></td>";
		$str.="<td><form  method='post' action='but.php'><textarea name='content-cost".$id."'>"; $str.=$x['cost'];
    $str.="</textarea><p><input type='submit' name='savecost".$name."' value='Save'></td>";
	 $str.="</tr>";

   }
 return $str;
}

function get_pages()
{
  $link=connectBD();
  $query = mysqli_query($link,"select * from pages1");
  $str="<table border='3px'>
<tr>
<td>Id</td><td>Страница</td><td>Content</td>
</tr>
  ";
  $id=0;
  while ($x = mysqli_fetch_assoc($query)){
    $id=$id+1;
    $str.="<tr >";
     $str.="<td>"; $str.=$x['id']; $str.="</td>";
     $str.="<td>".$x['title'];$str.="</td>";
      $str.="<td><form  method='post' action='but.php'><textarea name='content-page".$id."'>".$x['content'];
      $str.="</textarea><p><input type='submit' name='savepage' value='Save'></td>";
      $str.="</tr>";
  }

  return $str;
}

?>
