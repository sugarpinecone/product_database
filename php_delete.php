 <?php
header("Content-Type:text/html; charset=utf-8");
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>Data delete</TITLE>
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
 .top h7{
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
<div class="top">   <h1>訂單刪除</h1> </div>

<?php
   class MyDB extends sqlite3
   {
      function __construct()
      {
         $this->open('final_program.db');
      }
   }
   $db = new MyDB();
   if(!$db){
      echo $db->lastErrorMsg();
   } else {
      //echo "Opened database successfully";
   }
   error_reporting(E_ALL ^ E_NOTICE);
?>

<Form action = "php_delete.php" method = "GET">
<div class="top">
<h6>  查詢訂單,請輸入訂單編號：<input type="text" name="order_number">  </h6>

</form>
 <?php
 if( !(is_null($_GET['order_number']))){
		$sql =<<<EOF
      DELETE from GOODS_ORDER where order_number == {$_GET['order_number']};
EOF;
		$ret = $db->exec($sql);
		//DELETE from GOODS_ORDER where order_number == {$_GET['order_number']};
		//$ret = ("DELETE  FROM GOODS_ORDER WHERE order_number == {$_GET['order_number']}");
		//$db->exec($in_order);
		?>
		<div class="top"><h6>
		<?php 
		   echo '已刪除訂單  ' .$_GET['order_number'];
		?>
		 </h6>
		 <?php
 }
 ?>
 
 <Form action = "php_index.php" method = "GET">
<div class="button">	
<INPUT name="insert" type=submit value="回首頁"  style="width:100px;height:40px;font-size:20px;">
</div> 
</form>
 
 </BODY>
 </HTML>