<?php
  session_start();
?>
<head>
  <?error_reporting(E_ALL&~E_NOTICE&~E_WARNING); session_start();?>
  <style>
  .a a{ color: #000; text-decoration: none;}
  .a{ font-size: 13px; width: 500px; color: #000; text-decoration: none;}
  </style>
</head>
<body>
  <div class="a">
<?php
    if(!isset($_SESSION["uid"]))
    {
?>
        <a href="./login_form.html">관리자 로그인</a>
<?php
  }
  else
  {
?>
      관리자 | <a href="./logout.php">로그아웃</a> |
<?php
    if($_SESSION["uid"]=="admin")
    {
      ?>
      <a href="./bbs_up.php">제품소개 관리</a> | <a href="./write.html">게시판 글쓰기</a> | <a href="./a_online.html">온라인 견적 문의</a> 
    <?php
    }
  }
?>
  </div>
</body>
