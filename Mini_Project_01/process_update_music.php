<?php
  $mysqli = mysqli_connect('localhost', 'user', '******', 'opentutorials');
  settype($_POST['id'], 'integer');
  // echo $_POST['id'];
  $filtered = array (
    'id'=>mysqli_real_escape_string($mysqli ,$_POST['id']),
    'title'=>mysqli_real_escape_string($mysqli ,$_POST['title']),
    'album'=>mysqli_real_escape_string($mysqli ,$_POST['album']),
    'likes'=>mysqli_real_escape_string($mysqli ,$_POST['likes']),
    // 'singer_id'=>mysqli_real_escape_string($mysqli ,$_POST['singer_id'])
  );
  // echo $filtered['id'];
  // echo $filtered['singer_id'];

  $sql = "
    UPDATE music
    SET title = '{$filtered['title']}', album = '{$filtered['album']}',
        likes = '{$filtered['likes']}'
    WHERE id = '{$filtered['id']}'";
  // die($sql);
  $result = mysqli_multi_query($mysqli, $sql);
  if($result === false) {
    echo "수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.";
    error_log(mysqli_error($mysqli));
  } else {
    // echo '성공했습니다. <a href="index.php">돌아가기</a>';
    header('Location: index.php?id='.$filtered['id']);
  }
?>
