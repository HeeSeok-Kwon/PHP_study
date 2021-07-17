<?php
  // var_dump($_POST);

  $mysqli = mysqli_connect('localhost', 'root', 'root', 'opentutorials');
  // print_r($_POST);
  $filtered = array (
    'id'=>mysqli_real_escape_string($mysqli ,$_POST['id']),
    'name'=>mysqli_real_escape_string($mysqli ,$_POST['name']),
    'company'=>mysqli_real_escape_string($mysqli ,$_POST['company']),
  );

  $sql = "
    INSERT INTO singer
      (id, name, company)
      VALUES(
        '{$filtered['id']}',
        '{$filtered['name']}',
        '{$filtered['company']}'
        )";
  // die($sql);
  $result = mysqli_multi_query($mysqli, $sql);
  if($result === false) {
    echo "저장하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.";
    error_log(mysqli_error($mysqli));
  } else {
    // echo '성공했습니다. <a href="index.php">돌아가기</a>';
    header('Location: singer.php');
  }
  // echo $sql;
?>
