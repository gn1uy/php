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

  $id = $_GET['id'];
  $edit_sql = "SELECT * FROM member WHERE id = '$id'";
  $edit_stt = $pdo -> prepare($edit_sql);
  $edit_stt -> execute();
  $edit_row = $edit_stt->fetch();

?>

<h2 class="m-auto">修正画面</h2>

<form method="POST" action="update.php?id=<?=$id?>">
    <div class="flexbox">
      <ul class=formCat>
      <?php
        // 배열 마지막 인자 삭제
        $removed = array_splice($cat,0,1);
        $removed = array_pop($cat);

        foreach($cat as $value){
          echo "<li>".$value."</li>";
        }
     ?>
      </ul>
      <ul class="formCon">
        <li><input type="number" name="memberNum" value="<?=$edit_row['memberNum']?>"></li>
        <li><input type="text" name="name" value="<?=$edit_row['name']?>"></li>
        <li>
          <select name="formDivision" value="<?=$edit_row['department']?>">
            <?php
            foreach($resultDiv as $row){
              echo "<option>".$row['division']."</option>";
            } 
            ?>
          </select>
        </li>
        <li>
          <label><input type="radio" name="gender" value="wom" <?php checked("wom",$sex);?>>wom</label>
          <label><input type="radio" name="gender" value="manwom" <?php checked("manwom",$sex);?>>manwom</label>
        </li>
      </ul>
    </div>
    <input type="submit" value="submit" class="f_kanit btn text_c m-auto">
  </form>



<?php require_once("assets/inc/footer.php");?>