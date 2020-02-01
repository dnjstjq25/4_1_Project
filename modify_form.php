  <?php
  session_start(); 
         
  $num = $_REQUEST["num"];
 
  require_once("db.php"); 
  require_once("util.php"); 
  $pdo = db_connect(); 
  
  try{
     $sql = "select * from dnjstjq25.greet where num = ? ";
     $stmh = $pdo->prepare($sql); 
     $stmh->bindValue(1,$num,PDO::PARAM_STR); 
     $stmh->execute(); 
     $count = $stmh->rowCount();              
      
  if($count<1){  
     print "검색결과가 없습니다.<br>";
  }else{
       
   while($row = $stmh->fetch(PDO::FETCH_ASSOC)){
 	$item_subject = $row["subject"];
	$item_content = $row["content"];
 ?>
 <!DOCTYPE HTML>
 <html>
 <head> 
 <meta charset="utf-8">
	 <style>
		.col1{ float: left; width: 100px; background-color: #ededed; text-align: center; height: 25px;}
		.col2{ float: left;	margin-left: 10px;}
		#write_form #write_row1 { width:99%; height:25px; margin:2px 0 2px 0; }
		#write_form #write_row2 { width:99%; height:25px; margin:8px 0 2px 0; }
		#write_form #write_row3 { width:99%; height:251px; margin:8px 0 2px 0; }
		#write_form #write_row3 .col1{ height:111px; padding-top:120px;}
		#write_button{ width: 476px; float: right; margin-right: 30px;}
	</style>
 </head>
 <body>
 	<form  name="board_form" method="post" action="insert.php?mode=modify&num=<?=$num?>"> 
	<div id="write_form">
	  <div class="write_line"></div>
	  <div id="write_row1">
	     <div class="col1"> 이름 </div>
	     <div class="col2"><?=$_SESSION["name"]?></div>
	  </div>
	  <div class="write_line"></div>
	  <div id="write_row2">
             <div class="col1"> 제목   </div>
             <div class="col2"><input type="text" name="subject" value="<?=$item_subject?>" required></div>
	  </div>
	  <div class="write_line"></div>
          <div id="write_row3">
             <div class="col1"> 내용   </div>
             <div class="col2"><textarea rows="15" cols="79" name="content" required><?=$item_content?></textarea></div>
          </div>
	   <div class="write_line"></div>
	   </div>
	   <div id="write_button"><input type="image" src="./images/ok.png">&nbsp;
	     <a href="list.php?page=<?=$page?>"><input type="image" src="./images/list.png"></a>
	   </div>
	 </form>
<?php
         }
       }
     } catch (PDOException $Exception) {
       print "오류: ".$Exception->getMessage();
     }
 ?>
 </body>
 </html>