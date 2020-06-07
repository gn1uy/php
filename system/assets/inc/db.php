<?php
//데이터베이스 연결하기
$user = "admin";
$password = "1234";
$dbName = "db_1";
$host = "127.0.0.1";
$dsn = "mysql:host={$host};dbname={$dbName};chartset=utf-8";
$pdo = new PDO($dsn,$user,$password);

// db category
try {
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "db($dbName)is connect";
    // $pdo = NULL;
		$sql = "SELECT * FROM member ORDER BY id DESC";
		$stm = $pdo-> prepare($sql);
		$stm -> execute();
		$result = $stm ->fetchAll(PDO::FETCH_ASSOC);
}catch(Exception $e) {
    echo '<span>error</span>';
    echo $e->getMessage;
    exit();
}

// db category array
$cat = ["ID","社員番号","氏名","部署名","性別"," "];

// division list
try{
    $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sqlDiv = "SELECT * FROM department";
    $stm = $pdo->prepare($sqlDiv);
    $stm -> execute();
    $resultDiv = $stm ->fetchAll(PDO::FETCH_ASSOC);
}catch(Exception $e){
    echo "<p>error</p>";
    echo $e->getMessage;
    exit();
}

//  ******sex select
if (isSet($_POST["sex"])){
    $sexVal=["wom","manwom"];
    $isSex = in_array($_POST["sex"],$sexVal);
    if($isSex){
      $sex = $_POST["sex"];
    }else {
      $sex="error";
      $error[]="error";
    }
  }else {
    $isSex = false;
    $sex = "wom";
  }
 
  function checked($value,$question) {
    if(is_array($question)){
      $isChecked = in_array($value,$question);
    }else {
      $isChecked = ($value == $question);
    }
    if ($isChecked){
      echo "checked";
    }else {
      echo "";
    }
  }
 
 //  ******division select
 if(isSet($_POST["division"])){
   $divisionVal=["営業部","コーポレート","テック","人事"];
   $isDivision = in_array($_POST["division"],$divisionVal);
    if($isDivision){
      $division = $_POST["divison"];
    }else {
      $division = "error";
    }
 }else {
 }

 
  // pagenation
  if(!isset($_GET['page'])){
    $_GET['page']=1;
 }
 $list_size=2;
 $page_size=2;
 $first = ($_GET['page']*$list_size)-$list_size;
 $list_sql="SELECT * FROM member ORDER BY id DESC LIMIT $first,$list_size";
 $list_stt = $pdo -> prepare($list_sql);
 $list_stt-> execute();



// mysql equal counter primary key with id
// "ALTER TABLE member MODIFY ID AUTO_INCREMENT = value";

?>



