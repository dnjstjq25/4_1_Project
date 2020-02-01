<!DOCTYPE html>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale"/>
<html>
<head>
	<title>조은축산설비</title>
	<link rel="stylesheet" href="./css/product.css"/> <!-- css파일 불러오기 -->
	<link rel="stylesheet" href="./css/detail.css"/> <!-- css파일 불러오기 -->
	<style type="text/css"> 
		@font-face{
			font-family: 'Guide';
			src: url(./fonts/NanumBarunGothic.ttf) format("truetype");
		}
	</style>  <!-- 안내폰트 -->
	<script>
		function del(href)
		{
			if(confirm("정말 삭제하시겠습니까?")){
				document.location.href = href;
			}
		}
	</script>
</head>
<body style="overflow-x:hidden">
	<div id='wrap'>
		<div id='top'> <!-- 메인화면 상단 -->
			<div id='top_bar'>
				<div id='logo'>  <!-- 로고 -->
					<a href="index.html"><img src="./images/logo.PNG" alt></a>
				</div>
				<ul id='menu_list'> <!-- 메뉴바 -->
					<li class="menu_main">
						<a href="about_com.html"><h3>회사소개</h3></a>
						<ul class="sub">
							<li><a href="about_com.html">대표인사말</a></li> 
							<li><a href="history.html">연혁</a></li>
							<li><a href="maps.html">오시는길</a></li>
						</ul>
					</li>
					<li class="menu_main">
						<a class="link" href="product.html"><h3>제품소개</h3></a>
						<ul class="sub">
							<li><a href="product.html">자동급이시스템</a></li> 
							<li><a href="fan.html">환기시스템</a></li>
							<li><a href="etc.html">부품안내</a></li>
						</ul>
					</li>
					<li class="menu_main">
						<a class="link" href="notice.html"><h3>회사소식</h3></a>
						<ul class="sub">
							<li><a href="notice.html">공지사항</a></li> 
							<li><a href="news.html">축산뉴스</a></li>
						</ul>
					</li>
					<li class="menu_main">
						<a class="link" href="service.html"><h3>고객센터</h3></a>
						<ul class="sub">
							<li><a href="service.html">자주묻는질문</a></li> 
							<li><a href="online.html">온라인견적문의</a></li>
						</ul>
					</li>
				</ul>
				<div class="admin"> <?php include "./login_header.php";?> </div>
			</div> 
		</div>
		<div id='banner' class="banner"> <!-- 제품소개 배너 -->
			<img src="./images/tools.jpg">
					<dl id="banner_txt">
						<h1>조은축산설비 제품소개</h1>
						<p>좋은 품질을 보장합니다</p>
					</dl>
			<div class="quick_menu"> <!-- 퀵 메뉴바 -->
				<ul>
					<a href="product.html"><li>자동급이시스템</li></a>
					<a href="fan.html"><li>환기시스템</li></a>
					<a href="etc.html"><li>부품안내</li></a>
				</ul>
			</div> 
		</div>
		<div id='main'> <!-- 본문 -->
			<div class="arrow"> <!-- 페이지 위치 알림 -->
				 <p>Home > 제품소개 > 제품 상세 페이지</p>
			</div>
			<div class="detail">
				<?php 

				 $no=$_REQUEST[no];
				 $ctg=$_REQUEST[ctg];

				 require_once("db.php");
				 require_once("util.php");

	      		 $pdo = db_connect();

				 $file_dir = './data/'; 
				 
				 try{
				     $sql = "select * from dnjstjq25.per_up where no='$no' ";
				     $stmh = $pdo->prepare($sql);  
				     $stmh->bindValue(1, $no, PDO::PARAM_STR);      
				     $stmh->execute();            
				      
				    while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
				 	
				    $item_file01  = $row["file01"];  //사진
				    $item_no = $row["no"];
				 	$item_content = nl2br($row["Tstory"]);
				 	$item_ctg = $row["ctg"];
				 ?>

		        <div id="view_title">
			         <div id="view_img">
						<img src="./data/<?=$row[file01]?>" width="400px" height="400px"></a>
			         </div>
			         <div class="view_content">
			         	<?= $item_content ?>
			         </div>
				</div>
				<?php  
				  }
				  } catch (PDOException $Exception) {
				       print "오류: ".$Exception->getMessage();
				  }
				 ?> 
			</div>
			<div class="list_bt">
				<a href="javascript:history.back(-1)">목록</a>
				<a href="javascript:del('./delete2.php?no=<?=$no?>')">삭제</a>
			</div>
		</div> <!-- main -->
	</div><!-- wrap -->
	<div class="top">
		<a href="#"><img src="./images/top.png" width="50px" height="50px"></a>
	</div>
	<footer class="footer"> <!-- 화면 하단 -->
		<div class="copy"> <!-- 카피라이트 -->
			<p>상호명 : 조은축산설비 | 대표 : 이상은 | 사업자등록번호 : 312-26-69708 | 소재지 : 충남 천안시 서북구 성환읍 홍경길 29 (대홍리)</p>
			<p>TEL: 041-585-8855 | FAX : 041-585-8854 | E-mail : joeun8797@naver.com</p>
			<p>Copyright @ 2015 by 조은축산설비. All Rights Rerseved</p>
		</div>
	</footer>
</body>
</html>