<?php
  // update
  $escaped = array(
    'id'=>'',
    'name'=>'',
    'company'=>'',
  );
  $header2 = "Register Form";
  $label_submit = 'Register singer';
  $form_action = "process_register_singer.php";
  $form_id = '<input type="text" name="id" placeholder="ID">';
  if(isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($mysqli, $_GET['id']);
    // echo $filtered_id;
    settype($filtered_id, 'integer');
    $sql = "SELECT * FROM singer WHERE id={$filtered_id}";
    // query
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($result);
    $escaped['id'] = htmlspecialchars($row['id']);
    $escaped['name'] = htmlspecialchars($row['name']);
    $escaped['company'] = htmlspecialchars($row['company']);
    // 보이는 제목 바꾸기
    $header2 = "Update Form";
    $label_submit = 'Update singer';
    $form_action = "process_update_singer.php";
    $form_id = '<input type="text" readonly name="id" value="'.$escaped['id'].'">';
  }
?>
