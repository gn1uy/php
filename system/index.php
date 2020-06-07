 <?php
  require_once("assets/inc/header.php");
  require_once("assets/inc/db.php");
 ?>
    <p><a href="add.php" class="new">新規登録</a></p>
    <table class="memberList">
      <thead>
        <tr>
        <?php
         foreach($cat as $value){
           echo "<th>".$value."</th>";
         };
        ?>
        </tr>
      </thead>
      <tbody>
        <?php
          foreach($result as $row){
            echo '<tr>';
            echo '<td><a href="detail.php?id='.$row['id'].'">'.$row['id'].'</a></td>';
            $zero = sprintf('I-%03d',$row['memberNum']);
            echo '<td><a href="detail.php?id='.$row['id'].'">'.$zero.'</a></td>';
            echo '<td>'.$row['name'].'</td>';
            echo '<td>'.$row['department'].'</td>';
            echo '<td>'.$row['gender'].'</td>';
            echo '<td class="flexbox">
                  <a href="edit.php?id='.$row['id'].'"><img src="assets/img/icon_edit.png"></a>
                  <a href="del.php?id='.$row['id'].'"><img src="assets/img/icon_del.png"></a>
                  </td>';
            echo '</tr>';
          }
        ?>
    </tr>
      </tbody>

    </table>
    <div class="flexbox">
      <?php
        $total_sql = "SELECT COUNT(*)FROM member";
        $total_stt= $pdo -> prepare($total_sql);
        $total_stt -> execute();
        $total_row = $total_stt ->fetch();
        $total_list = $total_row['COUNT(*)'];
        $total_page = ceil($total_list/$list_size);
        $row = ceil($_GET['page']/$page_size);
        $start_page=(($row-1)*$page_size)+1;
        if($start_page<=0){
          $start_page=1;
        }
        $end_page=($start_page+$page_size)-1;
        if($total_page<$end_page){
          $end_page=$total_page;
        }
        if($_GET['page']!=1){ //ページネーションの基準
          $back=$_GET['page']-$page_size;
          if($back<=0){
            $back=1;
          }
          echo "<a href='$_SERVER[PHP_SELF]?page=$back class='btnBack'></a>";
        }
        for ($i=$start_page; $i<=$end_page;$i++){
          if($_GET['page']!=$i){
            echo "<a href='$_SERVER[PHP_SELF]?page=$i' class='pages'>";
          echo "$i";
          if($_GET['page']!=$i){
            echo "</a>";
          }
        }else {
          echo "<p class='currentPage'>$i</p>";
        }
        }
        if($_GET['page']!=$total_page) {
          $next=$_GET['page']+$page_size;
          if($total_page<$next){
            $next=$total_page;
          }
          echo "<a href='$_SERVER[PHP_SELF]?page=$next' class='btnNext'></a>";
        }

        ?>
    </div>

<?php require_once("assets/inc/footer.php");?>