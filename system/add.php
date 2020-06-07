<?php
  require_once("assets/inc/header.php");
  require_once("assets/inc/db.php");
?>

  <h2 class="m-auto">登録画面</h2>
  <form method="POST" action="complete.php">
    <div class="flexbox">
      <ul class=formCat>
        <?php
          $removed = array_splice($cat,0,1);
          $removed = array_pop($cat);
          foreach($cat as $value){
            echo "<li>".$value."</li>";
          }
        ?>
      </ul>
      <ul class="formCon">
        <li><input type="number" name="memberNum"></li>
        <li><input type="text" name="name"></li>
        <li>
          <select name="formDivision">
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
  

  <form method="post" action="index.php">
    <input type="submit" value="<<list">
  </form>

  <?php require_once("assets/inc/footer.php");?>