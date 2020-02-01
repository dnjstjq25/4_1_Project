<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<style>
		
		#list_search1 {float: left; width: 70%;}
		.list_top_title{float: left; width: 100%; background: #ededed; margin-top: 10px; height: 50px; border-top: 2px solid #50965A; }
		.list_bbs li{display: inline;}
		.li_subject{margin-left: 355px;}
		.li_id{margin-left: 355px;}
		.li_day{margin-left: 50px;}
		.li_hit{margin-left: 50px;}
		#list_item {float:left;height:20px;margin-top:4px;border-bottom: 1px solid #eeeeee;  width: 100%;}
		#list_item #list_item1{	float:left;	margin-left: 30px; width:40px;	text-align:center;}
		#list_item #list_item2{	float:left;	margin-left: 10px; width:735px;}
		#list_item #list_item3{	float:left;	margin-left: 1px; width:65px;	text-align:center;}
		#list_item #list_item4{	float:left;	margin-left: 19px; width:100px;text-align:center;}
		#list_item #list_item5{	float:left; width:40px;	margin-left: 25px; text-align:center;}
		#write_button {	margin-top:15px; width:50%; text-align:right; float: right; }
		#write_button a{text-decoration: none; color: #000;}
		#list_item2 a:link{text-decoration: none; color: #000;}
		#list_item2 a:hover{animation: a 0.5s ease-in-out; -webkit-animation: a 0.5s ease-in-out; 
			color: #000;}
			@-webkit-keyframes a {0%{color: #000}100%{color: #000}}
			@keyframes a {0%{color: #000}100%{color: #000}}
		#list_item2 a:visited{text-decoration: none; color: #000;}
		.clear2{width: 1080px; height: 50px; float: left;}
	</style>
</head>
<?php
require_once("db.php");
require_once("util.php");
$pdo = db_connect();

if(isset($_REQUEST["page"])) 
$page=$_REQUEST["page"]; 
else
$page=1;

$scale = 5;       
$page_scale = 3;  
$first_num = ($page-1) * $scale;


if(isset($_REQUEST["mode"]))
	$mode=$_REQUEST["mode"];
else
	$mode="";
if(isset($_REQUEST["search"]))
	$search=$_REQUEST["search"];
else
	$search="";

if(isset($_REQUEST["find"]))
	$find=$_REQUEST["find"];
else
	$find="";

if($mode=="search"){
	if(!search){
		?>
		<script>
			alert('검색할 단어를 입력하세요.');
			histroy.back();
		</script>
		<?php
	}
		$sql="select * from dnjstjq25.greet where $find like '%search%' and ctg='news' order by num desc";
	
} else {
	
		$sql="select * from dnjstjq25.greet where ctg='news' order by num desc limit $first_num, $scale";
}

try{
	$stmh = $pdo->query($sql);
	
		$sql = "select * from dnjstjq25.greet where ctg='news'";
	
	$stmh1 = $pdo->query($sql);

	$total_row = $stmh1->rowCount();
	$total_page = ceil($total_row / $scale);
	$current_page = ceil($page/$page_scale);

	?>
<body>
<form name="board_form" method="post" action="news.html?mode=search">
	<div id="list_search">
		<div id="list_search1">> 총 <?= $total_row ?> 개의 게시물이 있습니다.</div>
	</div>
</form>
<div class="clear"></div>
<div class="list_top_title">
	<ul class = "list_bbs">
		<li class="li_number">번호</li>
		<li class="li_subject">제목</li>
		<li class="li_id">글쓴이</li>
		<li class="li_day">등록일</li>
		<li class="li_hit">조회</li>
	</ul>
</div>
<?php
if($page==1)
	$start_num=$total_row;
else
	$start_num=$total_row-($page-1) * $scale;

while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
	$item_num=$row["num"];
	$item_id=$row["id"];
	$item_name=$row["name"];
	$item_hit=$row["hit"];
	$item_date=$row["regist_day"];
	$item_date=substr($item_date, 0, 10);
	$item_subject=str_replace(" ", "&nbsp;", $row["subject"]);
	$item_ctg = $ctg["ctg"];
	$item_content = str_replace(" ", "&nbsp;", $row["content"]);
	?>

	<div id="list_item">
		<div id="list_item1"><?= $start_num ?></div>
		<div id="list_item2"><a href="view.html?num=<?=$item_num?>&page=<?=page?>"><?=$item_subject?></a>
			
		</div>
		<div id="list_item3"><?= $item_name ?></div>
		<div id="list_item4"><?= $item_date ?></div>
		<div id="list_item5"><?= $item_hit ?></div>
	</div>
	<?php
		$start_num--;
	}
	} catch(PDOException $Exception) {
		print "오류: ".$Exception->getMessage();
	}
	?>
	<div class="clear2">
	</div>
</body>
</html>