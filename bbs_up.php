<?session_start(); ob_start(); ?>
<HTML>
<HEAD>
<meta charset="utf-8">
 <title> 조은축산설비 </title> 
<?
 $user_id=$_SESSION[user_id];

 require_once("db.php");
 require_once("util.php");

 $pdo = db_connect();


 
  ?>
    <style type="text/css"> 
 .vitally{color:#FF0000; font-weight:bold} /*필수표시*/
  .input_style1{border:1px solid #D1D1D1; width:70%; height:30px; background:#D0E0FB;} /* 상품이름*/
	.input_style3{border:1px solid #D1D1D1; width:120px; height:30px; background:#ECFEC8;} /* 상품카테고리*/
	.input_style4{border:1px solid #D1D1D1; width:120px; height:30px; background:#FFE4F0;} /* 상품가/판매가/배송비*/
 </style>

 </HEAD> 
 <body>

<TABLE BORDER='0' CELLSPACING='0' CELLPADDING='0' WIDTH='100%' HEIGHT='100%' ALIGN='CENTER'>
<TR>

<TR>
<TD  WIDTH='98%' HEIGHT='100%'  ALIGN='CENTER' VALIGN='TOP'  BGCOLOR='#FFFFFF'>

<table border='0' width='1000' height='100%'  cellspacing='0' cellpadding='0' align='center'>
  <tr>
    <td height='10' colspan='2' align='center' colspan='2' bgcolor='#FFFFFF'>&nbsp;</td>

<tr>
    <td height='40' colspan='2' align='center' bgcolor='#D2D2D0'>제 품 올 리 기</td>
  <tr>
    <td colspan='2' height='30' align='center'>
	 <font color='red'>필수사항 (*)표기 란은 꼭 입력해야 합니다.</font>
	</td>

	<form name='write' action='bbs_post.php' method='post' enctype='multipart/form-data'>
	<input type='hidden' name='id' value='bbs_2'>


<tr>
    <td width='20%' height='40'  align='center'>
	<font class="vitally" >*</font> 제품명
	</td>

    <td width='80%' height='40'  align='left'>
	     <input type='text' name='subject' class='input_style1'>
	</td>

<tr>
    <td height='40' colspan='2' align='left' >
	     &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<font class="vitally" >*</font>  
	                 게시판 카테고리 &nbsp;&nbsp;&nbsp;
                      <select name='ctg' class='input_style3'> 
              					  <option value='fan' class="fan"> 환기시스템
                          <option value='etc' class="etc"> 부품안내
                      </select>
    </td>


<tr>
    <td width='20%' height='40'  align='center'>
	<font class="vitally" >*</font> 목록이미지
	</td>

    <td width='80%' height='40'  align='left'>
	 <input  type="file" name='file01' >
</td>

<tr>
<td width='100%' height='auto' colspan='2' align='center' >
<div>상품설명</div>
 <textarea name="Tstory" id='editor_Tstory' style="width:80%; height:300px">
 </textarea>
</td>


<tr>
<td height='40' colspan='2' align='center' >
<input type='submit' value='상 품 올 리 기' onclick='postSubmit();'>
&nbsp; &nbsp; &nbsp;
<input type='button' value='취 소' onclick='history.back(-1);'>
</td>
	</form>


<tr>
    <td height='100%' colspan='2' align='center' bgcolor='#FFFFFF'>&nbsp;</td>
</tr>
</table>


</TD>
</TR>
</TABLE>

 </body>
 </HTML>