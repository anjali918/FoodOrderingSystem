<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" />
    <link rel="stylesheet" href="style.css">
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    
    <style>
        #detail_wrapper .dess {
    padding:100px;
    margin-bottom:20px;
}
#detail_wrapper .dess h3,h4{
    padding-bottom:10px;
    margin:5px;
    color:#086660;
}

#detail_wrapper .dess button{

width: 40px;
    height: 40px;
    line-height: 40px;
    border-radius: 50px;
    background-color: #e8f6ea;
    font-weight: 500;
    color: #088178;
    border-radius: 1px solid #cce7d0;
    border: 1px solid #cce7d0;
    position: absolute;
   margin-right:20px;
   cursor: pointer;
   
    
}
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding-top: 5px ;
  padding-left:5px;
  cursor: pointer;

  /* Position the tooltip */
  position:absolute;
  z-index: 1;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
}
    </style>
   

    <title>Souvenir</title>
</head>
<body>
<header>
        <a href="#" class="logo"><i class='bx bxs-home'></i>Yummy Tummy</a>
        <ul class="navlist">
            <li><a href="index.php">Home</a></li>
            <li><a href="#about">About Us</a></li>
            <li><a href="login.php">Login</a></li>
            <li><a href="#contact">Contact Us</a></li>
        </ul>
        <div class="nav-icons">
            <a href="#"><i class='bx bx-search'></i></a>
            <a  href="cart.php"><i class='bx bx-cart'></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>

        </div>
    </header>
    <section id="detail_wrapper" class="section-p1">
             
            
                 <?php include("connect.php");
                 $p_id=$_GET['f_id'];
                 $sql="SELECT * FROM food where f_id=$p_id";
                 $results=$con->query($sql);
                  $final=$results->fetch_assoc();

                    ?>
                 <div class="detail">
                     <img src="<?php echo $final['Img'] ?>" alt="product image">
</div>
                     <div class="dess">
                      <h3><?php echo $final['Name']?></h3>
                      <h4>Rs<?php echo $final['Price']?></h4>
                      <div class="tooltip">
                      <button><i class="fal fa-shopping-cart cart" onclick="location.href='carthandler.php?action=add-to-cart&cart_id=<?php echo $final['f_id']?>&cart_name=<?php echo $final['Name']?>&cart_price=<?php echo $final['Price']?>&cart_img=<?php echo $final['Img']?>'"></i></button>
                      <span class="tooltiptext" onclick="location.href='carthandler.php?action=add-to-cart&cart_id=<?php echo $final['f_id']?>&cart_name=<?php echo $final['Name']?>&cart_price=<?php echo $final['Price']?>&cart_img=<?php echo $final['Img']?>'">ADD TO CART</span>
</div>
                    </div>
                      
                 
                
                
            
    </section>
    
  
</body>
<script src="responsivebar.js"></script>
</html>