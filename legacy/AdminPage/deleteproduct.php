<?php
    if(isset($_GET['id'])){
        echo'Are you sure want to delete';
        echo'
        <form action="deleteproduct.php?id='.$_GET['id'].'" method="post">
        <input type="hidden" name="do" value="2" />
        <input type="submit" value="Yes" name="1"/>   
        </form>
        ';
        
    }
    
    if(isset($_POST['do'])==2){
        include('conn_db.php');
        $database="wdsf";
        $mysqli=new mysqli($host,$user,$password,$database);
        
        $query="delete from product where Product_id='".$_GET['id']."'";
        if (($result=$mysqli->query($query))==false)
	    {
		echo $mysqli->error;
	    }
        
        if($result){
            echo'<script>alert("The record has been deleted!");window.location.href="products.php"</script>';
        }
    }


?>