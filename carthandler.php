<?php
session_start();
$_SESSION['carthandler']=true;
if(isset($_GET["action"]))
{    
    if($_GET["action"]=="add-to-cart"){
        if(isset($_SESSION['cart'])){
            $cartdata = $_SESSION['cart'];
           
            $checker=array_column($cartdata,'f_id');
            if(in_array($_GET['cart_id'],$checker)){
                echo "<script>
                alert('Product is already in cart');
                window.location.href='index.php';
                </script>";
                
            }else{
                $cartdataCount = count($cartdata);
                $cartdata[$cartdataCount] = array('f_id'=>$_GET['cart_id'],'Name'=>$_GET['cart_name'],'Price'=>$_GET['cart_price'],'Img'=>$_GET['cart_img']);
                $_SESSION['cart'] = $cartdata;
           
            echo "<script> alert('Product Added');
            window.location.href='cart.php';
            </script>";
            }
        }
        else{
            $_SESSION['cart']=array(array('f_id'=>$_GET['cart_id'],'Name'=>$_GET['cart_name'],'Price'=>$_GET['cart_price'],'Img'=>$_GET['cart_img']));
            echo "<script> alert('Product Added');
            window.location.href='cart.php';</script>";
        } 

    }
}

if(isset($_GET["action"])){
    if($_GET["action"]=="delete"){
    
    
    foreach($_SESSION['cart'] as $key => $value){
        
        if($value['f_id']==$_GET['id']){
            unset($_SESSION['cart'][$key]);
            echo "<script>
            alert('Item Removed');
            window.location.href='cart.php';</script>";
        }
    }
    
}
}

?>