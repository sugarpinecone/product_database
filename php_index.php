<?php
header("Content-Type:text/html; charset=utf-8");
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>index</TITLE>
</HEAD>

<style>
 .top h1{
  font-family:"標楷體";
  text-align:center;
  color: #ff6666;
  }
 .top h6{
  font-family:標楷體;
  color: #cc66cc;
  font-size:21px;
  text-align:left;
  padding:10px 0;
 }
 .top h8{
  font-family:標楷體;
  color: #339999;
  font-size:21px;
  text-align:left;
  padding:10px 0;
 }
 .button{
  text-align:center;
  padding:20px 0;
 }
 .button_left{
  text-align: right;
  padding:20px 0;
 }

</style>
<BODY  style="background-color: LightGoldenRodYellow;" >
<br>
<div class="top">   <h1>歡迎光臨WA HA HA 公司</h1> </div>
<br>

<Form action = "php_insert.php" method = "GET">
<div class="button">	
<INPUT name="insert" type=submit value="新增訂單"  style="width:100px;height:40px;font-size:20px;"> 
</div>
</Form>

<Form action = "php_delete.php" method = "GET">
<div class="button">		
<INPUT name="delete" type=submit value="刪除訂單"  style="width:100px;height:40px;font-size:20px;">
</div>
</Form> 

<Form action = "php_query.php" method = "GET">
<div class="button">
<INPUT name="query" type=submit value="查詢訂單"  style="width:100px;height:40px;font-size:20px;"> 
</div>
</Form>

 </BODY>
 </HTML>