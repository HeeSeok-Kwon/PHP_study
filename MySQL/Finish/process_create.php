<?php
  // var_dump($_POST);

  $mysqli = mysqli_connect('localhost', 'root', 'root', 'opentutorials');
  // print_r($_POST);
  $filtered = array (
    'title'=>mysqli_real_escape_string($mysqli, $_POST['title']),
    'description'=>mysqli_real_escape_string($mysqli, $_POST['description']),
    'author_id'=>mysqli_real_escape_string($mysqli, $_POST['author_id'])
  );

  $sql = "
    INSERT INTO topic
      (title, description, created, author_id)
      VALUES(
        '{$filtered['title']}',
        '{$filtered['description']}',
        NOW(),
        {$filtered['author_id']}
        )";
  // die($sql);
  $result = mysqli_multi_query($mysqli, $sql);
  if($result === false) {
    echo "저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.";
    error_log(mysqli_error($mysqli));
  } else {
    echo '성공했습니다. <a href="index.php">돌아가기</a>';
  }
  // echo $sql;
?>
