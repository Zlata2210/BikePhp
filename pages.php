
<div class='table-pages'> Страницы

<?php
require_once 'function.php';

$pages = get_pages();
echo $pages;

?>

</table>
</div>

<div class='tablesmot'> Кроссовые мотоциклы
  <?php
  $_SESSION["tablename"]='';
  echo get_table("select * from cros","cros");
  echo "</table>";
  ?>
  <br><form  method='post' action='but.php'>
  <input type='submit' value='Add' name='addcros' method='post'>
    </form>
       <br>
  Спортивные мотоциклы
    <?php
    $_SESSION["tablename"]='';
    echo get_table("select * from sport","sport");
    echo "</table>";?><br>
    <form  method='post' action='but.php'>
    <input type='submit' value='Add' name='addsport' method='post'>
    </form>
    <br>
    Дорожные мотоциклы
     <?php
     $_SESSION["tablename"]='';
     echo get_table("select * from road","road");
     echo "</table>";?>

     <form  method='post' action='but.php'>
     <input type='submit' value='Add' name='addroad' method='post'>
     </form>
