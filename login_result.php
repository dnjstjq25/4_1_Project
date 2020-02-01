<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
</head>
<body>
<?php
session_start();

$uid = $_REQUEST["uid"];
$pwd = $_REQUEST["pwd"];

require_once("db.php");
require_once("util.php");
$pdo = db_connect();

try{
  $sql = "select * from dnjstjq25.member where uid = ?";
  $stmh = $pdo->prepare($sql);
  $stmh->bindValue(1,$uid,PDO::PARAM_STR);
  $stmh->execute();

  $count = $stmh->rowCount();
} catch (PDOException $Exception) {
  print "오류: ".$Exception->getMessage();
}
$row=$stmh->fetch(PDO::FETCH_ASSOC);

if($count<1){
?>

<script>
  alert("아이디 틀림");
  history.back();
</script>

<?php
} else if($pwd!=$row["pwd"]){
?>

<script>
  alert("비밀번호 틀림");
  history.back();
</script>
<?php
}else {
  $_SESSION["uid"]=$row["uid"];
  $_SESSION["name"]=$row["name"];
  $_SESSION["juso"]=$row["juso"];
  $_SESSION["phone"]=$row["phone"];

header("Location:/index.html");
exit();
}
?>
</body>
</html>
