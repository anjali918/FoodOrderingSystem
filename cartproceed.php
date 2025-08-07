

<?php 
// $data= $_POST['str'];
$data= $_REQUEST['q'];
$cartTotal=0;
session_start();

 
   if(isset($_SESSION['email']))
   {
     $user=$_SESSION['userid'];
     
    include('connect.php');
    
    $myArray = json_decode($data,true);
    foreach($myArray as $d){
   
      
      $product = $d['id'];
      $quantity = $d['quantity'];

      $que = "INSERT INTO `order` (user_id, food_id, qty) VALUES ($user, $product, $quantity)";
      $con->query($que);
      // $i++; 
        
    }// }while($i<count($myArray));
    echo" <script>alert('order placed sucessfully');
    window.location.href='index.php';</script>";
    
    unset($_SESSION['cart']);
      
   }
  
   else{
    header('location:login.php');
   }
 

     ?>