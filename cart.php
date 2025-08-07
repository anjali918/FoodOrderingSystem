<!DOCTYPE html>
<html lang="en">
<head>

<link rel="stylesheet" type="text/css" href="style.css">
        <!---box icons--->
        <link rel="stylesheet"
        href="https://unpkg.com/boxicons@latest/css/boxicons.min.css">

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
    
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <?php
    session_start();
    
?>
    <script>
        function totalprice(thisObj){
            
            var qty = thisObj.value;
           var inqty = parseInt(qty);
            var trObj = thisObj.parentElement.parentElement; //tr
            
            var priceval = trObj.querySelector(".price").innerHTML;
             var price = parseInt(priceval);
             var totalprice = qty*price;
             trObj.querySelector(".amount").innerHTML=totalprice;
            //  var quantitysec = document.getElementsByClassName("quantity");
             
             
             
             calculateGrandTotal();

        }

        function calculateGrandTotal(){
            
            var totalAmounts = document.getElementsByClassName("amount");
             
           
            var total=0;
            for(var i = 0; i < totalAmounts.length; i++ ){
                total = total + parseInt(totalAmounts[i].innerHTML);
            }
              
           
             
            
            document.getElementById("subtotal").innerHTML = total ;
             document.getElementById("cartAmt").value= total;
             
               document.getElementById("cartamt").value=total;
              var txAmt = 0.13*total;
             document.getElementById("txAmt").value=txAmt;
             
            var esewaTotal = total+txAmt;
              document.getElementById("tAmt").value=esewaTotal;;
             
        }

        function checkout(){
            var cartdataObject = document.getElementsByClassName("quantity");
            var arrayCartData = new Array();
            for(var i=0; i< cartdataObject.length; i++){
                var cartData =  new Object();
                cartData.id = cartdataObject[i].getAttribute("data-id");
                cartData.quantity = cartdataObject[i].value;
                arrayCartData.push(cartData);
            }
              cartData.cartAmt=document.getElementById("cartAmt").value;
            var jsonCartData = JSON.stringify(arrayCartData);
            

            
            var xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        // document.getElementById("thiss").innerHTML = this.responseText;
                        console.log("sucess");
                        console.log(jsonCartData);
                       

                    }
                };
                // xhttp.open("POST", "cartproceed.php", true);
                xhttp.open("GET" ,"cartproceed.php?q="+ jsonCartData, true);
                // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhttp.send();
                var anjali = 'http://localhost/page2/cartproceed.php?q='+jsonCartData;
                window.location.href=anjali;
            
            
            }
                
    </script>
     <title>Food</title>
</head>
<body onload="calculateGrandTotal()">
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
            <a  class="active" href="cart.php"><i class='bx bx-cart'></i></a>
            <div class="bx bx-menu" id="menu-icon"></div>

        </div>
    </header>
    <section>

<table width="100%" border="1px">
    <thead>
        <tr>
            <td>Remove</td>
            <td>Image</td>
            <td>Product name</td>
            <td>Price</td>
            <td>Quantity</td>
            <td>Subtotal</td>
        </tr>
    </thead>
    <?php
 
if(isset($_SESSION['cart'])){
   
   
    foreach($_SESSION['cart'] as $key=>$value){

    
        ?>
        <tr>
            
            <td >
                <a href="carthandler.php?action=delete&id=<?php echo $value["f_id"]?>" ><button id="remove_btn"><i id="trash" class="fa fa-trash fa-2x "aria-hidden="true"></i>
            <i  id="cross"class="fa fa-times fa-2x " aria-hidden="true"></i>
            


</button>
    </a></td>
            <td><img src="<?php echo $value["Img"]?>" alt="img" width="50px" height="50px"></td>
<td> <?php echo $value["Name"]?></td>
<td class="price"> <?php echo $value["Price"]?></td>
<td><input  name="quantity"type="number" class="quantity" min="1" max="100" data-id="<?php echo $value["f_id"]?> "  value="1" onchange="totalprice(this);"></td>
<td class="amount"><?php echo $value["Price"]?></td>

        </tr>
<?php
}
}
?>
</table>
  </section>
  <section id="cart-add" class="section-p1">
      <div id="sub-total">
          <form action="cartproceed.php" >
          <h3>Cart Total</h3>
          
          <table>
              <tr>
                  <td >Cart-subtotal</td>
                  <td id="subtotal"></td>
              </tr>
              <tr>
                <td>Shipping</td>
                <td>0(FREE)</td>
            </tr>
            <tr>
                <td><strong>Total</strong></td>
                <td ><input style="border: none" name="cartAmt" id="cartAmt" type="text" name="cartAmt"  readonly></td>
            </tr>
          </table>
          <button id="proceedbtn"class="normal" type="button" onclick="checkout();">Proceed</button>
          
    
          <br><br>
          </form>
          <div>
         
    
          </div>
          
      </div>
      
  </section>
    
</body>
<script src="responsivebar.js"></script>
</html>