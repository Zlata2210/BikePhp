<?php session_start();
$link = mysqli_connect('localhost', 'root', '', 'site');
//------------------------PAGES
if (isset($_POST['savepage'])) {
  $query= mysqli_query($link,"select id from pages1");
  $getid = mysqli_num_rows($query);
  for ($i=1; $i <=$getid ; $i++) {
    $name="content-page".$i;
    if (isset($_POST[$name])) {
      $que = " update pages1 SET content = '$_POST[$name]' where id=$i";
      $query = mysqli_query($link,$que);
    }
  }
header('Location:pages.php');
}


//------------------------CROSS
if (isset($_POST['addcros'])) {
  $query= mysqli_query($link,"select id from cros");
 $getid = mysqli_num_rows($query)+1;
	$que = " insert into cros (id, images, name, characters, cost) VALUES ($getid, '', '', '', ''); ";
  $query = mysqli_query($link,$que);
header('Location:pages.php');
}
if (isset($_POST['savenamecros'])||isset($_POST['savecharcros'])||isset($_POST['savecostcros'] )) {
  $query= mysqli_query($link,"select id from cros");
  $getid = mysqli_num_rows($query);

  for ($i=1; $i <=$getid ; $i++) {
    $name="content-name".$i;
    $char="content-char".$i;
    $cost="content-cost".$i;
    if (isset($_POST[$name])) {
      $que = " update cros SET name = '$_POST[$name]' where id=$i";
      $query = mysqli_query($link,$que);
    }
    if (isset($_POST[$char])) {
      $que = " update cros SET characters='$_POST[$char]' where id=$i";
        $query = mysqli_query($link,$que);
    }
    if (isset($_POST[$cost])) {
      $que = " update cros SET cost='$_POST[$cost]' where id=$i";
        $query = mysqli_query($link,$que);
    }

  }
header('Location:pages.php');
}

if (isset($_POST['delcros'])) {
  $query= mysqli_query($link,"select id from cros");
  $getid = mysqli_num_rows($query);

  for ($i=1; $i <=$getid ; $i++) {
    $name="cros".$i;
    if (isset($_POST[$name])) {
        $que = " delete from cros where id=$i";
          $query = mysqli_query($link,$que);
      }
    }
    header('Location:pages.php');

  }



//------------------------SPORT
if (isset($_POST['addsport'])) {
  $query= mysqli_query($link,"select id from sport");
 $getid = mysqli_num_rows($query)+1;
	$que = " insert into sport (id, images, name, characters, cost) VALUES ($getid, '', '', '', ''); ";
  $query = mysqli_query($link,$que);
header('Location:pages.php');
}
if (isset($_POST['delsport'])) {
  $query= mysqli_query($link,"select id from sport");
  $getid = mysqli_num_rows($query);

  for ($i=1; $i <=$getid ; $i++) {
    $name="sport".$i;
    if (isset($_POST[$name])) {
        $que = " delete from sport where id=$i";
          $query = mysqli_query($link,$que);
      }
    }
    header('Location:pages.php');

  }

if (isset($_POST['savenamesport'])||isset($_POST['savecharsport'])||isset($_POST['savecostsport'] )) {
  $query= mysqli_query($link,"select id from sport");
  $getid = mysqli_num_rows($query);

  for ($i=1; $i <=$getid ; $i++) {
    $name="content-name".$i;
    $char="content-char".$i;
    $cost="content-cost".$i;
    if (isset($_POST[$name])) {
      $que = " update sport SET name = '$_POST[$name]' where id=$i";
      $query = mysqli_query($link,$que);
    }
    if (isset($_POST[$char])) {
      $que = " update sport SET characters='$_POST[$char]' where id=$i";
        $query = mysqli_query($link,$que);
    }
    if (isset($_POST[$cost])) {
      $que = " update sport SET cost='$_POST[$cost]' where id=$i";
        $query = mysqli_query($link,$que);
    }

  }
header('Location:pages.php');
}

//------------------------ROAD
if (isset($_POST['addroad'])) {
  $query= mysqli_query($link,"select id from road");
 $getid = mysqli_num_rows($query)+1;
	$que = " insert into road (id, images, name, characters, cost) VALUES ($getid, '', '', '', ''); ";
  $query = mysqli_query($link,$que);
header('Location:pages.php');
}

if (isset($_POST['delroad'])) {
  $query= mysqli_query($link,"select id from road");
  $getid = mysqli_num_rows($query);

  for ($i=1; $i <=$getid ; $i++) {
    $name="road".$i;
    if (isset($_POST[$name])) {
        $que = " delete from road where id=$i";
          $query = mysqli_query($link,$que);
      }
    }
    header('Location:pages.php');

  }


if (isset($_POST['savenameroad'])||isset($_POST['savecharroad'])||isset($_POST['savecostroad'] )) {
  $query= mysqli_query($link,"select id from road");
  $getid = mysqli_num_rows($query);

  for ($i=1; $i <=$getid ; $i++) {
    $name="content-name".$i;
    $char="content-char".$i;
    $cost="content-cost".$i;
    if (isset($_POST[$name])) {
      $que = " update road SET name = '$_POST[$name]' where id=$i";
      $query = mysqli_query($link,$que);
    }
    if (isset($_POST[$char])) {
      $que = " update road SET characters='$_POST[$char]' where id=$i";
        $query = mysqli_query($link,$que);
    }
    if (isset($_POST[$cost])) {
      $que = " update road SET cost='$_POST[$cost]' where id=$i";
        $query = mysqli_query($link,$que);
    }

  }
header('Location:pages.php');
}




?>
