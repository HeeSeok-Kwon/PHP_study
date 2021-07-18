<?php
  // singer code
  $sql = "SELECT * FROM singer";
  $result = mysqli_query($mysqli, $sql);
  $select_form = '<select name="singer_id">';
  while($row = mysqli_fetch_array($result)) {
    $select_form .= '<option value="'.$row['id'].'">'.$row['name'].'</option>';
  }
  $select_form .= '</select>';
  // update
  $escaped = array(
    'id'=>'',
    'title'=>'',
    'album'=>'',
    'likes'=>'',
    'singer_id'=>''
  );
  $header2 = "Register Form";
  $label_submit = 'Register music';
  $form_action = "process_register_music.php";
  $form_id = '<input type="text" name="id" placeholder="ID">';
  if(isset($_GET['id'])) {
    $filtered_id = mysqli_real_escape_string($mysqli, $_GET['id']);
    // echo $filtered_id;
    settype($filtered_id, 'integer');
    $sql = "SELECT * FROM music WHERE id={$filtered_id}";
    // query
    $result = mysqli_query($mysqli, $sql);
    $row = mysqli_fetch_array($result);
    $escaped['id'] = htmlspecialchars($row['id']);
    $escaped['title'] = htmlspecialchars($row['title']);
    $escaped['album'] = htmlspecialchars($row['album']);
    $escaped['likes'] = htmlspecialchars($row['likes']);
    // echo $escaped['likes'];
    $escaped['singer_id'] = htmlspecialchars($row['singer_id']);
    // 보이는 제목 바꾸기
    $header2 = "Update Form";
    $label_submit = 'Update music';
    $form_action = "process_update_music.php";
    $form_id = '<input type="text" readonly name="id" value="'.$escaped['id'].'">';
    // echo $escaped['id'];
    $select_form = '<input type="text" readonly name="singer_id" value="'.$escaped['singer_id'].'">';
  }
?>
