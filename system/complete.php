<?php
  require_once("assets/inc/header.php");
  require_once("assets/inc/db.php");

  $insert_sql = "INSERT INTO member(memberNum,name,department,gender) VALUES (:memberNum,:name,:department,:gender)";
  $insert_stt = $pdo ->prepare($insert_sql);
  $insert_stt-> execute(
    array(
      ':memberNum' => $_POST['memberNum'],
      ':name' => $_POST['name'],
      ':department' => $_POST['formDivision'],
      ':gender' => $_POST['gender']
    )
  );
?>
<div class="complete__con">
  <h2>完了しました</h2>
  <p><a href="index.php">一覧へ戻る</a></p>
</div>

<?php require_once("assets/inc/footer.php");?>