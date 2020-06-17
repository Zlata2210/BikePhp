<?php
require_once 'function.php';
 ?>
<!DOCTYPE html>
<html>
<head>
<title>Админка</title>
</head>
<body>

<?php


$echo = "<div class='enter-admin'>

                        <form method='post' id='login-form' class='login-form'>

                                      <input type='text' placeholder='Логин' class='input'
                                        name='login' required><br>

                                     <input type='password' placeholder='Пароль' class='input'
                                       name='password' required><br>

                                    <input type='submit' value='Войти' class='button' name='enter'>

                      </form>

             </div>



             ";
echo $echo;
if(isset($_POST['login']) && isset($_POST['password'])) {

$_SESSION['login'] = $_POST['login'];
$_SESSION['password'] = $_POST['password'];

}

if(isset($_SESSION['login']) && isset($_SESSION['password'])) {

if(get_user($_SESSION['login'],$_SESSION['password'])&&isset($_POST['enter'])) {//Попытка авторизации
header('Location:pages.php');
}

}
 ?>
</body>
</html>
