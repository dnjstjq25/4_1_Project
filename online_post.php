<?header("content-type:text/html; charset=utf-8");
    session_start(); 

 $user_id=$_SESSION[user_id];
/////////////////////////////////////////////////////
$name=$_REQUEST['name'];    
$number=$_REQUEST['number'];      
$email=$_REQUEST['email'] ;
$juso=$_REQUEST['juso'];  
$subject=$_REQUEST['subject'];
$Tstory=$_REQUEST['Tstory'];  
///////////////////////////////////////////////////////

 require_once("db.php");
 require_once("util.php");

 $pdo = db_connect();
 
// 쿼리 전송;]
 try {
 	$pdo->beginTransaction();
	$query="insert into dnjstjq25.online(name, number, email, juso, subject, regist_day , Tstory)";
	$query.="values('$name', '$number', '$email', '$juso', '$subject', now() , '$Tstory')";
	$stmh = $pdo->prepare($query);
	$stmh -> bindValue(1, $name, PDO::PARAM_STR);
	$stmh -> bindValue(2, $number, PDO::PARAM_STR);
	$stmh -> bindValue(3, $email, PDO::PARAM_STR);
	$stmh -> bindValue(4, $juso, PDO::PARAM_STR);
	$stmh -> bindValue(5, $subject, PDO::PARAM_STR);
	$stmh -> execute();
	$pdo -> commit();
 } catch (Exception $Exception) {
 	$pdo->rollBack();
	print "오류:".$Exception->getMessage();
 }

?>

<script>
 window.alert('관리자에게 성공적으로 전달되었습니다.');
 location.href="./index.html"; 
	</script>