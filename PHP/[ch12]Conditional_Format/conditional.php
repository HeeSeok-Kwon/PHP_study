<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <h1>Conditional</h1>
    <?php
      echo '1<br>';
      // if(true) {
      //     echo '2<br>';
      // }
      // if(false) {
      //     echo '2<br>';
      // }
      if(true) {
        echo '2-1<br>';
      } else {
        echo '2-2<br>';
      }
      echo '3<br>';

      if(1==2) {
        echo '1==2';
      }
      else if(2==3){
        echo '2==3';
      }
      else {
        echo 'different<br>';
      }

      $res = (1==2) ? true : false;
      echo res;
    ?>
  </body>
</html>
