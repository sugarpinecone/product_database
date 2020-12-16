<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);

if($_SESSION['kk']!=''){}    
elseif($_SESSION['kk'] == '')
{$_SESSION['kk'] = 0;}

if($_SESSION['o_num']!=''){}   
elseif($_SESSION['o_num'] == '')
{$_SESSION['o_num'] = 10000;
echo 'o num in ss = ' .$_SESSION['o_num'];
echo '<br>';}
// o_num = order number 流水號那個


if($_SESSION['client_name']!=''){}   
elseif($_SESSION['client_name'] == '')
{}

if($_SESSION['client_number']!=''){}   
elseif($_SESSION['client_number'] == '')
{}

if($_SESSION['employee_name']!=''){}   
elseif($_SESSION['employee_name'] == '')
{}

if($_SESSION['e_ssn']!=''){}   
elseif($_SESSION['e_ssn'] == '')
{}

if($_SESSION['product']!=''){}   
elseif($_SESSION['product'] == '')
{}

if($_SESSION['p_mun']!=''){}   
elseif($_SESSION['p_mun'] == '')
{}

if($_SESSION['quailty']!=''){}   
elseif($_SESSION['quailty'] == '')

if($_SESSION['discount']!=''){}   
elseif($_SESSION['discount'] == '')
{}

if($_SESSION['deliver_method']!=''){}   
elseif($_SESSION['deliver_method'] == '')
{}

if($_SESSION['receiver_name']!=''){}   
elseif($_SESSION['receiver_name'] == '')
{}


?>




<?php
header("Content-Type:text/html; charset=utf-8");
?>
<HTML>
<HEAD>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<TITLE>Data Insert</TITLE>
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
  font-size:19px;
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
<BODY style="background-color: LightGoldenRodYellow;" >
<div class="top">   <h1>新增訂單</h1> </div>
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
      //echo'<br>';      
   }
?>


<?php //---------------------------------------------------------------訂購人---------------?>

<Form action = "php_insert.php" method = "GET">
訂購人資料：
<select name="client_name" onchange="javascript:submit()" >
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

<?php 
    if( !(is_null($_GET['client_name']))){
       $_SESSION['client_name'] = $_GET['client_name'];
    }
?>
<div class="top">  
<h7>  <?php    echo '您的名稱 : ' .$_SESSION['client_name'];  ?>  </h7>
<br><br>

<?php //---------------------------------------------------------------接洽人---------------?>

<Form action = "php_insert.php" method = "GET">
接洽人：
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

<?php 
    if( !(is_null($_GET['employee_name']))){
       $_SESSION['employee_name'] = $_GET['employee_name'];
    }
?>
<div class="top">  
<h7>  <?php    echo '接洽人 : ' .$_SESSION['employee_name'];  ?>  </h7>
<br><br>

<?php //---------------------------------------------------------------產品種類---------------?>

<Form action = "php_insert.php" method = "GET">
選擇商品：
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

<?php 
    if( !(is_null($_GET['product']))){
       $_SESSION['product'] = $_GET['product'];
    }
?>
<div class="top">  
<h7>  <?php    echo '商品種類 : ' .$_SESSION['product'];  ?>  </h7>
<br><br>


<?php //---------------------------------------------------------------物品數量---------------?>

<Form action = "php_insert.php" method = "GET">
請輸入欲訂購數量：<input type="text" name="quailty">
</form>

<?php 
    if( !(is_null($_GET['quailty']))){
       $_SESSION['quailty'] = $_GET['quailty'];
    }
?>
<div class="top">  
<h7>  <?php    echo '物品數量 : ' .$_SESSION['quailty'];  ?>  </h7>
<br><br>



<?php //---------------------------------------------------------------運輸方式---------------?>

<Form action = "php_insert.php" method = "GET">
運輸方式：
<select name="deliver_method" onchange="javascript:submit()">
  <option value=""></option>
　<option value="airplane">airplane</option>
　<option value='truck'>truck</option>
　<option value="train">train</option>
</select>
</form>

<?php 
    if( !(is_null($_GET['deliver_method']))){
       $_SESSION['deliver_method'] = $_GET['deliver_method'];
    }
?>
<div class="top">  
<h7>  <?php    echo '選擇的運貨方式 : ' .$_SESSION['deliver_method'];  ?>  </h7>
<br><br>



<?php //---------------------------------------------------------------收件人---------------?>

<Form action = "php_insert.php" method = "GET">
收件人姓名：<input type="text" name="receiver_name">
</form>

<?php 
    if( !(is_null($_GET['receiver_name'])) ){
       $_SESSION['receiver_name'] = $_GET['receiver_name'];
    }
?>
<div class="top">  
<h7>  <?php    echo '填入的收件人姓名 : ' .$_SESSION['receiver_name'];  ?>  </h7>
<br><br>







<?php
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
			
			<?php //$_SESSION['client_number'] = $row['client_number'] ;  // 把取出的 $row['client_number'] 放到 $_SESSION['client_number']中
				echo "    client num = " .$_SESSION['client_number'];?>

  
			<?php } ?>
			</tr>

			</table>

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

			<?php  $_SESSION['e_ssn'] = $row['ssn'];?>

			<?php } ?>

			</tr>

			</table>

	<?php } ?>

	
	
	
	
	
	
	
	<?php
		if( !(is_null($_GET['product']))){
			
		//$sql = "SELECT * FROM PRODUCT WHERE product_name == {$_GET['product']}"; 
		
		$ret = $db->query("SELECT * FROM PRODUCT WHERE product_name == '{$_GET['product']}'");		
		
		?>	
			<table  border="1">

			<tr>
			
			<td>product_number</td>

			<td>product_name</td>

			<td>type_number</td>
			
			<td>unit_price</td>

			</tr>

			<tr>
			<?php
			while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ ?>

			<?php  $_SESSION['p_num'] = $row['product_number'];?>
			<?php echo 'p_num = ' .$_SESSION['p_num'];?>

			<?php } ?>

			</tr>

			</table>

	<?php } ?>


<Form action = "php_insert.php" method = "GET">
<input type = "submit" name = "reset" value = "reset"
    style="width:80px;height:40px;font-size:20px;"></input>
<input type = "submit" name = "enter" value = "確定"
    style="width:80px;height:40px;font-size:20px;"></input>
</form>





<?php
if( is_null( $_GET['reset'] ) )    //reset 是否被按過
{}
else{  
    $_SESSION['kk'] = 0;   //每刷新一次頁面kk+1 
   // unset($_SESSION['o_num'] );  
    unset($_SESSION['client_name']);  
    unset($_SESSION['employee_name']);  
    unset($_SESSION['e_ssn']);  
    unset($_SESSION['product']);  
    unset($_SESSION['quailty']);  
    unset($_SESSION['deliver_method']);  
    unset($_SESSION['receiver_name']); 
}?>

			<Form action = "php_insert.php" method = "GET">
	
			<INPUT name="continue" type=submit value="繼續新增定單"  style="width:160px;height:40px;font-size:20px;"> 
			<?php
			if( is_null( $_GET['continue'] ) )  
			{}
			else{
  				  unset($_SESSION['client_name']);  
   				 unset($_SESSION['employee_name']);  
   				 unset($_SESSION['e_ssn']);  
   				 unset($_SESSION['product']);  
   				 unset($_SESSION['quailty']);  
   				 unset($_SESSION['deliver_method']);  
  				 unset($_SESSION['receiver_name']);  
  
			}
			?>
			</Form>




<div class="top">
<h6> <?php
 $m = $_SESSION['o_num'] + 1;
 echo '訂單編號  = ' .$m;  
?>  </h6>
						
 
<?php 	$getDate= date("Y-m-d");  ?>

<div class="top">
<h6> <?php echo '日期 : ' . $getDate;  ?>  </h6>

<?php
  echo '<br>';
  $_SESSION['kk'] = $_SESSION['kk'] + 1 ;

  if( is_null( $_GET['enter'] ) )    //enter 是否被按過
  {}
  else{  
  
  if( $_SESSION['client_name']!='' ){

    if(  $_SESSION['employee_name']!=''   ){

      if(  $_SESSION['product']!=''   ){

        if(  $_SESSION['quailty']!=''  ){

          if(  $_SESSION['deliver_method']!=''   ){
          
            if(  $_SESSION['receiver_name']!=''   ){

	      $_SESSION['o_num'] = $_SESSION['o_num'] + 1 ;

	      echo '<br>' ;
	  
              if($_SESSION['quailty'] < 5){$shi_fee = 60 ; } 
	      else{
	        $shi_fee = 50 + (  $_SESSION['quailty'] * 3  );

	      }
          $in_order = "INSERT INTO GOODS_ORDER(order_number , order_date , deliver_date , deliver_method , shipping_fee , receiver , c_number , e_ssn )VALUES('{$_SESSION['o_num']}' , '{$getDate}' , '{$getDate}' , '{$_SESSION['deliver_method']}' , '{$shi_fee}' , '{$_SESSION['receiver_name']}' , '{$_SESSION['client_number']}' , '{$_SESSION['e_ssn']}' )";
	      $db->exec($in_order);
		  
		  


	      $ret = $db->query("SELECT * FROM GOODS_ORDER WHERE order_number == '{$_SESSION['o_num']}'");	
?>	
		
			<table  border="1">

			<tr>			

			<td>order-number</td>

			<td>order_date</td>

			<td>deliver_date</td>

			<td>deliver_method</td>

			<td>shipping_fee</td>

			<td>receiver </td>

			<td>client name</td>

			<td>employee name </td>

			</tr>

			<tr>
			<?php
			while($row = $ret->fetchArray(SQLITE3_ASSOC) ){ ?>

			<td><?php echo $row['order_number']; ?></td>  

			<td><?php echo $row['order_date']; ?></td>  

			<td><?php echo $row['deliver_date'];   ?></td>   

			<td><?php echo $row['deliver_method'];   ?></td>   

			<td><?php echo $row['shipping_fee'];   ?></td>   

			<td><?php echo $row['receiver'];   ?></td>   

			<td><?php echo $_SESSION['client_name'];  ?></td>   

			<td><?php echo $_SESSION['employee_name'];   ?></td>   


			<?php } ?>

			</tr>

			</table>
<?php		
		$_SESSION['discount'] = 20 ;
		  $in_order_detail = "INSERT INTO ORDER_DETAIL(quantity , discount , o_number , p_number )VALUES ( '{$_SESSION['quailty']}' , '{$_SESSION['discount']}' ,  '{$_SESSION['o_num']}' ,'{$_SESSION['p_num']}' )";
	      $db->exec($in_order_detail);
?>

	      <?php
	      
            }else{echo 'receiver_name = null' ;  } 
          }else{echo 'deliver_method = null' ;  } 
        }else{echo 'quailty = null' ;  } 
      }else{echo 'product = null' ;  } 
    }else{echo 'employee_name = null' ;  } 
  }else{echo 'client_name = null' ;  } 
}  //else( is_null( $_GET['enter'] ) ) 的大括號



?>

<Form action = "php_index.php" method = "GET">
<div class="button">	
<INPUT name="insert" type=submit value="回首頁"  style="width:100px;height:40px;font-size:20px;">
</div> 
</form>

</BODY>
</HTML>