<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<meta charset="UTF-8">
	<style>
		#list_search1 {float: left; width: 70%; margin-left: 30px;}
		.list_top_title{float: left; width: 100%; background: #ededed; margin-top: 10px; height: 50px; border-top: 2px solid #5d5d5d; margin-left: 30px;}
		.list_bbs li{display: inline;}
		.li_subject{margin-left: 355px;}
		.li_id{margin-left: 355px;}
		.li_day{margin-left: 70px;}
		#list_item {float:left;height:20px;margin-top:4px;border-bottom: 1px solid #eeeeee; margin-left: 30px; width: 100%;}
		#list_item #list_item1{	float:left;	margin-left: 30px; width:40px;	text-align:center;}
		#list_item #list_item2{	float:left;	margin-left: 10px; width:735px; text-align: center;}
		#list_item #list_item3{	float:left;	margin-left: 1px; width:65px;	text-align:center;}
		#list_item #list_item4{	float:left;	margin-left: 39px; width:100px;text-align:center;}
		#write_button {	margin-top:15px; width:50%; text-align:right; float: right; }
		#write_button a{text-decoration: none; color: #000;}
		#list_item2 a:link{text-decoration: none; color: #000;}
		#list_item2 a:hover{animation: a 0.5s ease-in-out; -webkit-animation: a 0.5s ease-in-out; 
			color: #000;}
			@-webkit-keyframes a {0%{color: #000}100%{color: #000}}
			@keyframes a {0%{color: #000}100%{color: #000}}
		#list_item2 a:visited{text-decoration: none; color: #000;}
		.li_page{margin-top:15px; text-align: right; float: left; width: 50%;}
		#page_button {margin-top:20px;}
		#page_button a{text-decoration: none;}
		#page_num {float:left; width:100%; margin-top:10px; text-align:center;}
	</style>
</head>
<?php
$ctgs = basename($_SERVER['PHP_SELF']);

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
		$sql="select * from dnjstjq25.online where $find like '%search%' and ctg='a_online' order by num desc";
}else {
		$sql="select * from dnjstjq25.online where ctg='a_online' order by num desc limit $first_num, $scale";
}
	

try{
	$stmh = $pdo->query($sql);

		$sql = "select * from dnjstjq25.online where ctg='a_online'";

	$stmh1 = $pdo->query($sql);

	$total_row = $stmh1->rowCount();
	$total_page = ceil($total_row / $scale);
	$current_page = ceil($page/$page_scale);

	?>
<body>
<form name="board_form" method="post" action="a_online.html?mode=search">
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
	</ul>
</div>
<?php
if($page==1)
	$start_num=$total_row;
else
	$start_num=$total_row-($page-1) * $scale;

while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
	$item_num=$row["num"];
	$item_name=$row["name"];
	$item_date=$row["regist_day"];
	$item_date=substr($item_date, 0, 10);
	$item_subject=str_replace(" ", "&nbsp;", $row["subject"]);
	$item_ctg = $ctg["ctg"];
	?>

	<div id="list_item">
		<div id="list_item1"><?= $start_num ?></div>
		<div id="list_item2"><a href="view1.html?num=<?=$item_num?>&page=<?=page?>"><?=$item_subject?></a></div>
		<div id="list_item3"><?= $item_name ?></div>
		<div id="list_item4"><?= $item_date ?></div>
	</div>

	<?php
		$start_num--;
	}
	} catch(PDOException $Exception) {
		print "오류: ".$Exception->getMessage();
	}
		$start_page = ($current_page -1) * $page_scale + 1;
		$end_page = $start_page + $page_scale - 1;
	?>
	
		<div id="page_button">
		<div id="page_num">
	<?php

	 if($page!=1 && $page>$page_scale)
	 {
	 	$prev_page = $page - $page_scale;

	 	if($prev_page <= 0)
	 		$prev_page = 1;
	 	print "<a href=<?= $ctg ?>.html?page=$prev_page>◀ </a>";
	 }

	 for($i=$start_page; $i<=$end_page && $i<= $total_page; $i++) 
      {        
        if($page==$i) 
           print "<font color=red><b>[$i]</b></font>"; 
        else 
           print "<a href=<?= $ctg ?>.html?page=$i>[$i]</a>";
      }

      if($page<$total_page)
      {
        $next_page = $page + $page_scale;
        if($next_page > $total_page) 
            $next_page = $total_page;
        print "<a href=list.php?page=$next_page> ▶</a><p>";
      }
      ?>
      </div>
  </div>
</body>
</html>