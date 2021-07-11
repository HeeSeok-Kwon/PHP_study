<?php
  // echo "<p>title : ".$_GET['title']."<p>";
  // echo "<p>descripton : ".$_GET['description']."<p>";
  file_put_contents('data/'.$_POST['title'], $_POST['description']);
?>

<!-- GET : 북마크 용도로 적합
POST : 데이터 수정, 삽입, 삭제 -->
