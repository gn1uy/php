<?php
  require_once("assets/inc/header.php");
  require_once("assets/inc/db.php");

$update_sql = "UPDATE member 
                SET memberNum=:memberNum, name=:name, department=:department,gender=:gender
                where id={$_GET['id']}";
$update_stt = $pdo -> prepare($update_sql);
$update_stt->execute (
  array (
    ':memberNum' => $_POST['memberNum'],
    ':name' => $_POST['name'],
    ':department' => $_POST['formDivision'],
    ':gender' => $_POST['gender']
  )
  );

 ?>

 
<Script>
window.alert('edit complete!');
location.href='index.php'
</Script>
<?php require_once("assets/inc/footer.php");?>