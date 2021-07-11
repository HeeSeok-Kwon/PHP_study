<?php
  $mysqli = mysqli_connect('localhost', 'user', '******', 'opentutorials');
  settype($_POST['id'], 'integer');
  $filtered = array (
    'name'=>mysqli_real_escape_string($mysqli, $_POST['name']),
    'profile'=>mysqli_real_escape_string($mysqli, $_POST['profile']),
    'id'=>mysqli_real_escape_string($mysqli, $_POST['id'])
  );

  $sql = "
    UPDATE author
    SET name = '{$filtered['name']}', profile = '{$filtered['profile']}'
    WHERE id = '{$filtered['id']}'";
  // die($sql);
  $result = mysqli_multi_query($mysqli, $sql);
  if($result === false) {
    echo "수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.";
    error_log(mysqli_error($mysqli));
  } else {
    // echo '성공했습니다. <a href="index.php">돌아가기</a>';
    header('Location: author.php?id='.$filtered['id']);
  }
?>
