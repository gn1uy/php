<?php
  require_once("assets/inc/header.php");
  require_once("assets/inc/db.php");

  
// id data
  try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "SELECT * FROM member WHERE id = {$_GET['id']}";
		$stm = $pdo-> prepare($sql);
		$stm -> execute();
		$resultId = $stm ->fetchAll(PDO::FETCH_ASSOC);
  }catch(Exception $e) {
      echo '<span>error</span>';
      echo $e->getMessage;
      exit();
  }

?>
<h2>確認画面</h2>
<div class="flexbox">
  <ul class="formCat">
  <?php
      // 배열 마지막 인자 삭제
      $removed = array_pop($cat);

      foreach($cat as $value){
        echo "<li>".$value."</li>";
      }


    ?>
  </ul>
  <ul>
    <?php
      // brings data 
      foreach($resultId as $row){
        echo '<li>'.$row['id'].'</li>';
        $zero = sprintf('I-%03d',$row['memberNum']);
        echo '<li>'.$zero.'</li>';
        echo '<li>'.$row['name'].'</li>';
        echo '<li>'.$row['department'].'</li>';
        echo '<li>'.$row['gender'].'</li>';
      }
    ?>
  </ul>
</div>
<form method="post" action="index.php">
  <input type="submit" value="<<list" class="f_kanit btn text_c m-auto">
</form>
<form method="post" action="edit.php?id=<?php echo $_GET['id'] ?>">
  <input type="submit" value="edit" class="f_kanit btn text_c">
</form>
<?php require_once("assets/inc/footer.php");?>