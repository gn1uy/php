<?php
  require_once("assets/inc/header.php");
  require_once("assets/inc/db.php");
  $id = $_GET['id'];
  $del_sql = "DELETE FROM member where id =$id";
  $del_stt = $pdo -> prepare($del_sql);
  $del_stt->execute();
  echo
  "<script>
    window.alert('delete complete');
    location.href ='index.php';
  </script>"
?>

<?php require_once("assets/inc/footer.php");?>