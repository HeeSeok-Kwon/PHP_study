<?php
  // var_dump($_POST);

  $mysqli = mysqli_connect('localhost', 'root', 'root', 'opentutorials');
  // print_r($_POST);
  $filtered = array (
    'id'=>mysqli_real_escape_string($mysqli ,$_POST['id']),
    'title'=>mysqli_real_escape_string($mysqli ,$_POST['title']),
    'album'=>mysqli_real_escape_string($mysqli ,$_POST['album']),
    'likes'=>mysqli_real_escape_string($mysqli ,$_POST['likes']),
    'singer_id'=>mysqli_real_escape_string($mysqli ,$_POST['singer_id'])
  );

  $sql = "
    INSERT INTO music
      (id, title, album, likes, singer_id)
      VALUES(
        '{$filtered['id']}',
        '{$filtered['title']}',
        '{$filtered['album']}',
        '{$filtered['likes']}',
        '{$filtered['singer_id']}'
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
