<?php
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
function get_table($que)
{
	$link = connectBD();
	$query = mysqli_query($link,$que);
	$str ="<table >";
 while ($x = mysqli_fetch_assoc($query)){
	 $str.="<tr >";
	 $str.="<td>";
	 $str.="<img src='images/"; $str.=$x['images']; $str.=".jpg'";
		$str.="</td>";
	  $str.="<td>"; $str.=$x['name']; $str.="</td>";
		$str.="<td>"; $str.=$x['characters']; $str.="</td>";
		$str.="<td>"; $str.=$x['cost']; $str.="</td>";
	 $str.="</tr>";
 }
 $str.="</table>";
 return $str;
}
function get_content($que,$id) {
	$text;
	$link=connectBD();
	$query = mysqli_query($link,$que);
	while ($x = mysqli_fetch_assoc($query)){

		if ($id == $x['iden'] ) {$text = $x['content']; break;}
	}
   return $text;
}
function first()
{

	$html = file_get_contents('single/wrapper.txt');
	$html = str_replace("[%body%]", file_get_contents('single/body.txt'), $html);
	$html = str_replace("[%header%]", file_get_contents('single/header.txt'), $html);
	$html = str_replace("[%footer%]", file_get_contents('single/footer.txt'), $html);
	if (empty($_GET))
	$page = "index1";
	else
	$page = $_GET["cat"];
	$page=stristr($page, '.',true);
	$menu = array(
	   'index1' => 'Главная страница',
	   'road' => 'Дорожные',
		 'cros' => 'Кроссовые',
		 'sport' => 'Спортивные',
		 'authtor'=> 'Об авторе',
		 'contact' => 'Контакты'
	 );
	 $title = $menu[$page];


		 $html = str_replace("[%title%]", $title, $html);
		$menuitem='';
	 foreach ($menu as $key => $name)
	 {
		 if ($key==$page) $tmp=file_get_contents("single/menu_select.txt");
		 else $tmp=file_get_contents("single/menuitem.txt");
			 $tmp = str_replace("[%link%]", '/?cat='.$key.'.php', $tmp);
			$tmp = str_replace("[%name%]", $name, $tmp);
	   $menuitem.=$tmp;
	 }

	 $html = str_replace("[%menu%]", file_get_contents('single/menu.txt'), $html);

		  $html = str_replace("[%dodoc%]", file_get_contents("single/do".$page.".txt"), $html);

	 $html = str_replace("[%menuitem%]", $menuitem, $html);
	 if ($page=="road") {
		 $id=$page;
		$content = get_content("select * from pages1",$id);
		 $content.= get_table("select * from road");
		 $html = str_replace("[%document%]", $content, $html);
		 $html = str_replace("[%dodoc%]", file_get_contents("single/do".$page.".txt"), $html);
	 }
	 else if ($page=="index1" || $page=="authtor"||$page=="contact") {
		 $id=$page;
		$content = get_content("select * from pages1",$id);

		$html = str_replace("[%document%]", $content, $html);
	 }
	 else if ($page=="cros") {
		 $id=$page;
		 	$content = get_content("select * from pages1",$id);
 		 $content.= get_table("select * from cros");
 		$html = str_replace("[%document%]", $content, $html);
		$html = str_replace("[%dodoc%]", file_get_contents("single/do".$page.".txt"), $html);
	 }
	 else if ($page=="sport") {
		 $id=$page;
		 $content = get_content("select * from pages1",$id);
			$content.=get_table("select * from sport");
		 $html = str_replace("[%document%]", $content, $html);
		 $html = str_replace("[%dodoc%]", file_get_contents("single/do".$page.".txt"), $html);
	}

echo $html;

}

first();
?>
