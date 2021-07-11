<!DOCTYPE html>
<html>
  <body>
    <h1>String & String Operator</h1>
    <?php
      echo 'Hello world<br>';
      echo "Hello 'w'orld<br>"; // "" 안에 ""이 있으면 에러 발생
      echo "Hello \"w\"orld<br>"; // "" 이것의 역할을 해제하는 기호 \
      echo "Hello "."world"; // 결합연산자
    ?>
    <h2>String length function</h2>
    <?php
      echo strlen("Hello world"); 
    ?>
  </body>
</html>
