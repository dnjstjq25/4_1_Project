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
  .input_style1{border:1px solid black; width:120px;  } /* 이름 */
  .input_style2{border:1px solid black; width:300px;  } /* 전화번호 */
	.input_style3{border:1px solid black; width:300px;  } /* 이메일 */
	.input_style4{border:1px solid black; width:700px;  } /* 주소 */
  .input_style5{border:1px solid black; width:700px;  } /* 제목 */
  .big_t{margin-left: 30px;}
 </style>

 </HEAD> 
 <body>

<TABLE BORDER='0' CELLSPACING='0' CELLPADDING='0' WIDTH='100%' HEIGHT='100%' ALIGN='CENTER' class="big_t">
<TR>

<TR>
<TD  WIDTH='98%' HEIGHT='100%'  ALIGN='CENTER' VALIGN='TOP'  BGCOLOR='#FFFFFF'>

<table border='0' width='1000' height='100%'  cellspacing='0' cellpadding='0' align='center'>
  <tr>
    <td height='10' colspan='2' align='center' colspan='2' bgcolor='#FFFFFF'>&nbsp;</td>

<tr>
    <td height='40' colspan='2' align='center' bgcolor='#D2D2D0'>온라인 견적 문의하기</td>
  <tr>
    <td colspan='2' height='30' align='center'>
	 <font color='red'>필수사항 (*)표기 란은 꼭 입력해야 합니다.</font><br>
   <font color='red'>문의하신 내용은 관리자가 확인 후 이메일 또는 전화연락을 합니다.</font>
	</td>

	<form name='write' action='online_post.php' method='post' enctype='multipart/form-data'>
	<input type='hidden' name='id' value='bbs_2'>


<tr>
    <td width='20%' height='40'  align='center'>
	<font class="vitally" >*</font> 이름
	</td>

    <td width='80%' height='40'  align='left'>
	     <input type='text' name='name' class='input_style1'>
	</td>

<tr>
    <td height='40' align='center' width='20%' >
      &nbsp;&nbsp;&nbsp;&nbsp;
<font class="vitally" >*</font> 전화번호           
    </td>
    
     <td width='80%' height='40'  align='left'>
       <input type='text' name='number' class='input_style2'>
     </td>

<tr>
    <td width='20%' height='40'  align='center'>
      &nbsp;&nbsp;
	<font class="vitally" >*</font> 이메일
	</td>

    <td width='80%' height='40'  align='left'>
	 <input  type="text" name='email' class='input_style3'>
</td>

<tr>
  <td width="20%" height='40' align='center'>
    <font class="vitally">*</font> 주소
  </td>

    <td width='80%' height='40'  align='left'>
   <input  type="text" name='juso' class='input_style4'>
</td>

<tr>
  <td width="20%" height='40' align='center'>
    <font class="vitally">*</font> 제목
  </td>

    <td width='80%' height='40'  align='left'>
   <input  type="text" name='subject' class='input_style5'>
</td>

<tr>
<td width='100%' height='auto' colspan='2' align='center' >
<div> <font class="vitally">*</font> 상세 문의 내용</div>
 <textarea name="Tstory" id='editor_Tstory' style="width:80%; height:300px">
 </textarea>
</td>


<tr>
<td height='40' colspan='2' align='center' >
<input type='submit' value='문 의 하 기' onclick='postSubmit();'>
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