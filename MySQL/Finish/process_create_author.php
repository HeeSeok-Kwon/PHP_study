<?php
  $mysqli = mysqli_connect('localhost', 'root', 'root', 'opentutorials');
  $filtered = array (
    'name'=>mysqli_real_escape_string($mysqli, $_POST['name']),
    'profile'=>mysqli_real_escape_string($mysqli, $_POST['profile'])
  );

  $sql = "
    INSERT INTO author
      (name, profile)
      VALUES(
        '{$filtered['name']}',
        '{$filtered['profile']}'
        )";
  // die($sql);
  $result = mysqli_multi_query($mysqli, $sql);
  if($result === false) {
    echo "저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.";
    error_log(mysqli_error($mysqli));
  } else {
    // echo '성공했습니다. <a href="author.php">돌아가기</a>';
    header('Location: author.php'); 
  }
?>
