<?php
    //code to be modified
    //notice : you don't need to login to add to cart 
    // note : wrap add to cart with anchor tag   
    session_start();
    $title="added to cart";
    $self=basename($_SERVER['PHP_SELF']);
    require("./inc/header.php");

    #require("./inc/dbconnect.php");
    print_r( $_SESSION['cart']);

//check for one valid produc id
if(isset($_GET['prod_id']) && filter_var($_GET['prod_id'],FILTER_VALIDATE_INT,
array("options"=>array('min_range'=>1)))){
        // get the product id 
    $prod_id=$_GET['prod_id'];
        
    echo '<div class="addcart">';
    //check if cart already contains this product 
    if(isset($_SESSION['cart'][$prod_id])){
        $_SESSION['cart'][$prod_id]['quantity']++; // add 1 ti the current quantity for this product
        //display confirmation message that another product quantity has been added
        echo '<div class="w3-container w3-teal"><h2>Added to Cart
        <a href="viewcart.php"><i class="fas fa-shopping-cart" id="carticon" title="View Cart"></i></a>
        </h2><p class="indent">Another item has been added to your shopping cart</p>';
    }
    else{
        // new product to put into cart or first time 
        require("./inc/dbconnect.php");
        $sql="SELECT prod_price FROM seansfoods_products WHERE prod_id=$prod_id";
        $result=mysqli_query($dbc,$sql);
        //check to see if a price for that product was returned
        if(mysqli_num_rows($result)==1){
            // save it into the cart array
            //list() takes it out of an array and put it as an element
            list($price)=mysqli_fetch_array($result,MYSQLI_NUM);
            $_SESSION['cart'][$prod_id]=array(
                'quantity'=>1,
                'price'=>$price
            );
            //display success message
            echo '<div class="w3-container w3-teal"><h2>Added to Cart
            <a href="viewcart.php"><i class="fas fa-shopping-cart" id="carticon" title="View Cart"></i></a>
            </h2><p class="indent">The product has been added to your shopping cart</p>';
        }
        else{
            echo '<div class="w3-container w3-red"><h1>Oh No!</h1><p class="indent">Duplicate products lines in database or other database errors</p></div>';
        }
        print_r($_SESSION['cart']);
        mysqli_close($dbc);
    }
}
else{
    echo '<div class="w3-container w3-red"><h1>Oh No!</h1><p class="indent"> THis page has been accessed in error.</p></div>';
}

echo '<p class="indent"><a href="previous.html" onClick="history.back();return false;"><button id="contbutton">Continue Shopping</button></a>
<a href="viewcart.php"><button id="viewbutton">View Cart</button></a>
</p></div></div>';

require("./inc/footer.php");

?>