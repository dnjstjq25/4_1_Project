<?header("content-type:text/html; charset=utf-8");
    session_start(); 

 $user_id=$_SESSION[user_id];
/////////////////////////////////////////////////////
$id=$_REQUEST['id'];    
$ctg=$_REQUEST['ctg'];      
$subject=$_REQUEST['subject'] ;
$file01=$_REQUEST['file01']['name'];  
$Tstory=$_REQUEST['Tstory'];  
///////////////////////////////////////////////////////

 require_once("db.php");
 require_once("util.php");

 $pdo = db_connect();

 $extvalue =explode(".",$file01);  // . 을 기준으로 분리
 $extexplode=count($extvalue)-1;  // 배열중 맨뒤에 '.'
 $ext_result = $extvalue[$extexplode];  // 원파일 확장자 
 $ext_results = strtolower($ext_result); // strtolower:소문자로 변환

///////// 파일체크 /////////
$img_ext = array('jpg', 'jpge', 'gif','png','file');//파일확장자 종류
if(array_search($ext_results,$img_ext)=== false) {// false: 아니면
	
	} 

///////// 용량체크 /////////
$size_1=$_FILES['file01']['size'];
if($size_1>2097152)

///////// 파일명 생성 /////////
$times=time();
$dates=date("mdh_i" ,$times);  //예) 010101_01
$newfile01=chr(rand(97,122)).chr(rand(97,122)).$dates.rand(1,9).rand(1,9).".".$ext_result;


$dir="./data/";  // 업로드폴더 지정
move_uploaded_file($_FILES['file01']['tmp_name'],$dir.$newfile01); //업로드
chmod($dir.$newfile01,0777);  //모든 퍼미션이 읽기/쓰기를 허용

$regdate=date("Ymdhis",time()); //날짜/시간
 $ip=getenv("REMOTE_ADDR");  //IP

// 쿼리 전송;]
$pdo->beginTransaction();
$query="insert into dnjstjq25.per_up(id, ctg, subject, file01, Tstory, regdate, ip)";
$query.="values('$id', '$ctg', '$subject', '$newfile01', '$Tstory', '$regdate', '$ip')";
$stmh = $pdo->prepare($query);
$stmh -> execute();
$pdo -> commit();


?>

<script>
 window.alert('게시글이 업로드 되었습니다.');
  location.href="./<?= $ctg ?>.html"; // 업로드한 게시판으로 이동
	</script>