<?php
	session_start();
	include("validation.php");
?>
<?php
$error='';
	

if(empty($_POST['name']) || empty($_POST['price']) || empty($_POST['unit']) || empty($_POST['type']) || empty($_POST['des']))
{	
	$error.='Please fill all the data <br/>';
}
	
if(empty($error))
{
	 include('conn_db.php');
     $database='wdsf';
	 $mysqli=new mysqli($host,$user,$password,$database); 
	 
	 
	 
	 $query="select max(Product_id) as ProductNo from product";
	 if (($result=$mysqli->query($query))==false)
	 {
		echo $mysqli->error;
	 }
	 
	 $row=$result->fetch_assoc();
     $ProductNo=$row['ProductNo'];
     	 
     $no=(int)substr($ProductNo,1)+1;
  
     
     $newProductNo=substr($ProductNo,0,1);
  
     
	 for($i=6-strlen($no); $i>=1;$i--)
	 {
		$newProductNo.='0';
	 }
	 
	 $newProductNo.=$no;
	 
	 $query="insert into product(Product_id,Product_Name,Product_price,unit,Category_id,Details) values('".$newProductNo."','".$_POST['name']."','".$_POST['price']."','".$_POST['unit']."','".$_POST['type']."','".$_POST['des']."')";
	 
	 if (($result=$mysqli->query($query))==false)
	 {
      echo $mysqli->error;
      
	 }
	 
	 if ($result)
	 {  
		$destination = "../assets/seafoodimg/".$newProductNo.".jpg";
		move_uploaded_file($_FILES['img']['tmp_name'], $destination);
		echo '<script>alert("Record for '.$_POST['name'].' had been added! The Product no is '.$newProductNo . '")</script>';
		header('Refresh:3; URL=products.php');
	 } 
}
else
{
	 echo '<div align="center" style="color:#FFFFFF;background-color:#FF0000; font-weight:bold">'.$error.'</div><br />';	
     require('products.php');	 
}
?>