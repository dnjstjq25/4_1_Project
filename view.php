<?php
	session_start();

	$num=$_REQUEST["num"];

	require_once("db.php");
	require_once("util.php");

	$pdo=db_connect();

	try{
		$sql = "select * from dnjstjq25.greet where num=?";
		$stmh = $pdo->prepare($sql);
		$stmh->bindValue(1, $num, PDO::PARAM_STR);
		$stmh->execute();

		while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
			$item_num = $row["num"];
			$item_id = $row["id"];
			$item_name = $row["name"];
			$item_subject = str_replace(" ", "&nbsp;", $row["subject"]);
			$item_content = nl2br($row["content"]);
			$item_date = $row["regist_day"];
			$item_date = substr($item_date, 0, 10);
			$item_hit = $row["hit"];

			$new_hit = $item_hit + 1;

		try{
			$pdo->beginTransaction();
			$sql = "update dnjstjq25.greet set hit=? where num=?";
			$stmh = $pdo->prepare($sql);
			$stmh->bindValue(1, $new_hit, PDO::PARAM_STR);
			$stmh->bindValue(2, $num, PDO::PARAM_STR);
			$stmh->execute();
			$pdo->commit();
		}catch (PDOException $Exception){
			$pdo->rollback();
			print "오류: ".$Exception->getMessage();
		}
		?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<script>
		function del(href)
		{
			if(confirm("정말 삭제하시겠습니까?")){
				document.location.href = href;
			}
		}
	</script>
<style>				
	#view_title {height:18px; padding:10px 8px 8px 8px; border-top:solid 2px #aaaaaa; background-color:#eeeeee; margin-bottom:5px; margin-top: 20px; margin-left : 60px;}
	#view_title1 {float:left; width:70%;}
	#view_title2 {float:left; width:28%; text-align:right;}
	#view_content {	width:96%; min-height:200px; padding:15px; overflow:hidden; line-height:150%; border-bottom:solid 1px #cccccc; margin-left: 50px;}
	#view_button {width:98%; text-align:right; margin-top:15px; margin-bottom:15px;}
	#view_button a:link{text-decoration: none; color: #000;}
	#view_button a:hover{animation: a 0.5s ease-in-out; -webkit-animation: a 0.5s ease-in-out; 
			color: #000;}
			@-webkit-keyframes a {0%{color: #000}100%{color: #000}}
			@keyframes a {0%{color: #000}100%{color: #000}}
	#view_button a:visited{text-decoration: none; color: #000;}
</style>
</head>
<body>
		<div id="view_title">
			<div id="view_title1"><?= $item_subject ?></div>
			<div id="view_title2"><?= $item_name ?> | 조회 : <?= $item_hit ?> | <?= $item_date ?> </div>
			</div>
			<div id="view_content"><?= $item_content ?></div>
			<div id="view_button"><a href="./notice.html">목록</a> &nbsp;
<?php
			if(isset($_SESSION["uid"])) {
				if($_SESSION["uid"]=="admin"){
			?>
				<a href="./modify_form.php?num=<?=$num?>">수정</a> &nbsp;
				<a href="javascript:del('./delete.php?num=<?=$num?>')">삭제</a> &nbsp;
				<?php	
			}
				?>
				<?php
			}
			}
	}catch(PDOException $Exception){
			print "오류: ".$Exception->getMessage();
		}
?>
	</div>
	<div class="clear"></div>
</body>
</html>