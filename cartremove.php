<?php
session_start();

if(isset($_GET["action"])){
    if($_GET["action"]=="delete"){
    
    
    foreach($_SESSION['cart'] as $key => $value){
        
        if($values['cart_id']==$_GET['p_id']){
            unset($_SESSION['cart'][$key]);
            echo "<script>
            alert('Item Removed');
            window.location.href='cart.php';</script>";
        }
    }
    
}
}


?>
