﻿<?php
header("Content-Type:text/html; charset=utf-8");
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>Data Query</TITLE>
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
  font-size:17px;
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
<div class="top">   <h1>訂單查詢</h1> </div>

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
     // echo "Opened database successfully";
   }
?>

<Form action = "php_query.php" method = "GET">
<div class="top">   
<h6>查詢訂單,請輸入訂單編號：<input type="text" name="order_number"></h6>

</form>

<Form action = "php_query.php" method = "GET">
<div class="top">   <h6>
查詢訂單明細,請輸入訂單編號：<input type="text" name="order_detail">
</h6>
</form>

<Form action = "php_query.php" method = "GET">
<div class="top">   
<h6>查詢商品資料：</h6>
<select name="product" onchange="javascript:submit()">
  <option value=""></option>
　<option value="led">led</option>
　<option value='bag'>bag</option>
　<option value="flashlight">flashlight</option>
　<option value="battery">battery</option>
  <option value="clock">clock</option>
  <option value="remote_control">remote_control</option>
  <option value="screw">screw</option>
  <option value="wire">wire</option>
  <option value="tweezers">tweezers</option>

</select>
</form>

<Form action = "php_query.php" method = "GET">
<div class="top">   <h6>
查詢訂購人資料：
</h6>
<select name="client_name" onchange="javascript:submit()">
  <option value=""></option>
　<option value="john">john</option>
　<option value="alicia">alicia</option>
　<option value="mario">mario</option>
　<option value="kobe">kobe</option>
  <option value="joyce">joyce</option>
  <option value="ramesh">ramesh</option>
  <option value="jennifer">jennifer</option>
  <option value="wallance">wallance</option>
  <option value="morris">morris</option>
  <option value="lrving">lrving</option>
  <option value="marcie">marcie</option>

</select>
</form>

<Form action = "php_query.php" method = "GET">
<div class="top">   <h6>
查詢接洽人資料：
</h6>
<select name="employee_name" onchange="javascript:submit()">
  <option value=""></option>
　<option value="jabbar">jabbar</option>
　<option value="wong">wong</option>
　<option value="curry">curry</option>
　<option value="kley">kley</option>
  <option value="stephen">stephen</option>
  <option value="kacob">kacob</option>
  <option value="jones">jones</option>
  <option value="damin">damin</option>
  <option value="jereblo">jereblo</option>

</select>
</form>

<br><br><br>
<?php
error_reporting(E_ALL ^ E_NOTICE);
	if( !(is_null($_GET['order_number']))){
		

		$ret = $db->query("SELECT * FROM GOODS_ORDER WHERE order_number == {$_GET['order_number']}");
		
		
			?>
			<table  border="1">

			<tr>

			<td>order_number</td>

			<td>order_date</td>

			<td>deliver_date</td>
			
			<td>deliver_method</td>
			
			<td>shipping_fee</td>
	
			<td>receiver</td>

			</tr>

			<tr><?php
			while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ ?>

			<td><?php echo $row['order_number'];   ?></td>    

			<td><?php echo $row['order_date'];   ?></td>

			<td><?php echo $row['deliver_date']; ?></td>    

			<td><?php echo $row['deliver_method']; ?></td>  

			<td><?php echo $row['shipping_fee']; ?></td>  

			<td><?php echo $row['receiver']; ?></td>  
  
			<?php } ?>
			</tr>

			</table>

			<Form action = "php_query.php" method = "GET">
	
			<INPUT name="continue" type=submit value="繼續查詢"> 

			</Form>
	<?php	
	}	
		
	if( !(is_null($_GET['order_detail']))){

		//$sql = "SELECT * FROM ORDER_DETAIL WHERE o_number == {$_GET['order_number']}"; 
		
		$ret = $db->query("SELECT * FROM ORDER_DETAIL WHERE o_number == {$_GET['order_detail']}");
		
	?>
			
			<table  border="1">

			<tr>

			<td>order_number</td>

			<td>quantity</td>

			<td>discount</td>
			
			<td>product_number</td>

			</tr>

			<tr>
			<?php
			while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ ?>

			<td><?php echo $row['o_number'];   ?></td>    

			<td><?php echo $row['quantity'];   ?></td>

			<td><?php echo $row['discount']; ?></td>    

			<td><?php echo $row['p_number']; ?></td>  
  
			<?php } ?>
			</tr>

			</table>

			<Form action = "php_query.php" method = "GET">
	
			<INPUT name="continue" type=submit value="繼續查詢"> 

			</Form>
		<?php	
	}
		
	if( !(is_null($_GET['product']))){
			
		//$sql = "SELECT * FROM PRODUCT WHERE product_name == {$_GET['product']}"; 
		
		$ret = $db->query("SELECT * FROM PRODUCT WHERE product_name == '{$_GET['product']}'");
		
		
		?>
		
			
			<table  border="1">

			<tr>

			<td>product_name</td>

			<td>product_number</td>

			<td>type_number</td>

			<td>unit_price</td>
			

			</tr>

			<tr>
			<?php
			while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ ?>
			
			<td><?php echo $row['product_name'];   ?></td>    

			<td><?php echo $row['product_number'];   ?></td>

			<td><?php echo $row['type_number']; ?></td>    

			<td><?php echo $row['unit_price']; ?></td>  
  
			<?php } ?>
			</tr>

			</table>

			<Form action = "php_query.php" method = "GET">
	
			<INPUT name="continue" type=submit value="繼續查詢"> 

			</Form>
		<?php	
		}	
	
	if( !(is_null($_GET['client_name']))){
			
		//$sql = "SELECT * FROM CLIENT WHERE liaison  == {$_GET['client_name']}"; 
		
		$ret = $db->query("SELECT * FROM CLIENT WHERE liaison  == '{$_GET['client_name']}'");
		
		?>
		
			
			<table  border="1">

			<tr>
			
			<td>liaison</td>

			<td>liaison_title</td>

			<td>company_name</td>

			<td>client_number</td>

			<td>liaison_address</td>
			

			</tr>

			<tr><?php
			
			while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ ?>
			
			<td><?php echo $row['liaison']; ?></td>  

			<td><?php echo $row['liaison_title']; ?></td>  

			<td><?php echo $row['company_name'];   ?></td>    

			<td><?php echo $row['client_number'];   ?></td>
			
			<td><?php echo $row['liaison_address']; ?></td> 
  
			<?php } ?>
			</tr>

			</table>

			<Form action = "php_query.php" method = "GET">
	
			<INPUT name="continue" type=submit value="繼續查詢"> 

			</Form>
		<?php	
		}	
	

	if( !(is_null($_GET['employee_name']))){
			
		//$sql = "SELECT * FROM EMPLOYEE WHERE name == {$_GET['employee_name']}"; 
		
		$ret = $db->query("SELECT * FROM EMPLOYEE WHERE name == '{$_GET['employee_name']}'");
		
		
		
		?>
		
	
			
			<table  border="1">

			<tr>
			
			<td>name</td>

			<td>ssn</td>

			<td>title</td>

			</tr>

			<tr>
			<?php
			while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ ?>

			<td><?php echo $row['name']; ?></td>  

			<td><?php echo $row['ssn']; ?></td>  

			<td><?php echo $row['title'];   ?></td>   
			<?php } ?>

			</tr>

			</table>

			<Form action = "php_query.php" method = "GET">
	
			<INPUT name="continue" type=submit value="繼續查詢"> 

			</Form>
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









