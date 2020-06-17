<?php session_start();

$link = mysqli_connect('localhost', 'root', '', 'site');

  if(!empty($_FILES['img']['tmp_name'])){

  	if(!empty($_FILES['img']['error'])){
  	$_SESSION['msg'] = 'Произошла ошибка загрузки';
  	header('Location:pages.php');
  	}

  	if($_FILES['img']['size']>2*1024*1024){
  	$_SESSION['msg'] = 'Файл слишком большой';
  	header('Location:pages.php');
  	}

  	switch($_FILES['img']['type']){

  	case 'image/jpeg':
  	case 'image/pjpeg':
  	$type = 'jpeg';
  	break;

  	case 'image/png':
  	case 'image/x-png':
  	$type='png';
  	break;

  	case 'image/gif':
  	$type = 'gif';
  	break;

  	default:
  	$_SESSION['msg'] = 'Неправильный тип изображения';
  	header('Location:pages.php');
  	break;
  	}

  	if(!move_uploaded_file($_FILES['img']['tmp_name'],'images/'.$_FILES['img']['name'])){
  	$_SESSION['msg'] = 'Не удалось загрузить файл';
  	header('Location:pages.php');
  	}
  	$_SESSION['msg'] = 'Файл успешно загружен';

    }
    else{
    $_SESSION['msg'] = 'Вы не загрузили файл';
    $name = $_FILES['img']['name'];

    //header('Location:pages.php');
    }
  	//header('Location:pages.php');
    $link = mysqli_connect('localhost', 'root', '', 'site');

    $query= mysqli_query($link,"select id from cros");
    $getid = mysqli_num_rows($query);
    for ($i=1; $i <$getid ; $i++) {
      $table = 'cros'.$i;
      if (isset($_POST[$table])) {
        $name = basename($_FILES['img']['name']);
      	$img=stristr($name, '.',true);
        $que = " update cros SET images = '$img' where id=$i";
        $query = mysqli_query($link,$que);
      }
  }
  $query= mysqli_query($link,"select id from sport");
  $getid = mysqli_num_rows($query);
  for ($i=1; $i <$getid ; $i++) {
    $table = 'sport'.$i;
    if (isset($_POST[$table])) {
      $name = basename($_FILES['img']['name']);
      $img=stristr($name, '.',true);
      $que = " update sport SET images = '$img' where id=$i";
      $query = mysqli_query($link,$que);
    }
}
$query= mysqli_query($link,"select id from road");
$getid = mysqli_num_rows($query);
for ($i=1; $i <$getid ; $i++) {
  $table = 'road'.$i;
  if (isset($_POST[$table])) {
    $name = basename($_FILES['img']['name']);
    $img=stristr($name, '.',true);
    $que = " update road SET images = '$img' where id=$i";
    $query = mysqli_query($link,$que);
  }
}
  header('Location:pages.php');





?>
