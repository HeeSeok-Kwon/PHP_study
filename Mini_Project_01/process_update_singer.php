<?php
  require("lib/connect.php");
  
  settype($_POST['id'], 'integer');
  // echo $_POST['id'];
  $filtered = array (
    'id'=>mysqli_real_escape_string($mysqli ,$_POST['id']),
    'name'=>mysqli_real_escape_string($mysqli ,$_POST['name']),
    'company'=>mysqli_real_escape_string($mysqli ,$_POST['company']),
  );
  // echo $filtered['id'];
  // echo $filtered['singer_id'];

  $sql = "
    UPDATE singer
    SET name = '{$filtered['name']}', company = '{$filtered['company']}'
    WHERE id = '{$filtered['id']}'";
  // die($sql);
  $result = mysqli_multi_query($mysqli, $sql);
  if($result === false) {
    echo "수정하는 과정에서 문제가 생겼습니다. 관리자에게 문의해주세요.";
    error_log(mysqli_error($mysqli));
  } else {
    // echo '성공했습니다. <a href="index.php">돌아가기</a>';
    header('Location: singer.php?id='.$filtered['id']);
  }
?>
