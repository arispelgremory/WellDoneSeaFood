<?php
    if(isset($_GET['Order_ID'])){
        echo'Are you sure want to delete';
        echo'
        <form action="deleteOrder.php?id='.$_GET['Order_ID'].'" method="post">
        <input type="hidden" name="do" value="2" />
        <input type="submit" value="Yes" name="1"/>   
        </form>
        ';
        
    }
    
    if(isset($_POST['do'])==2){
        include('conn_db.php');
        $database="wdsf";
        $mysqli=new mysqli($host,$user,$password,$database);
        
        $query='delete from orders where Order_Id="'.$_GET['id'].'"';
        echo $query;
        if (($result=$mysqli->query($query))==false)
	    {
		echo $mysqli->error;
	    }
        
        if($result){
            echo'<script>alert("The record has been deleted!");window.location.href="orderView.php"</script>';
        }
    }


?>