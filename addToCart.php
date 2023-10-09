<?php
    //code to be modified
    //notice : you don't need to login to add to cart 
    // note : wrap add to cart with anchor tag   
    // session_start();
    $title="added to cart";
    $self=basename($_SERVER['PHP_SELF']);
    include("./inc/header.php");
    include("./view/Message.php");
    include("./view/ButtonGroup.php");
    include("./service/ProductService.php");

    if(!isset($_SESSION['cart']))
        $_SESSION['cart']=array();
        
    if(isset($_GET['product_id']) && filter_var($_GET['product_id'],FILTER_VALIDATE_INT,
    array("options"=>array('min_range'=>1)))){

        // get the product id 
        $product_id=$_GET['product_id'];

    //check if cart already contains this product 
    if(isset($_SESSION['cart'][$product_id])){
        $_SESSION['cart'][$product_id]['quantity']++; // add 1 ti the current quantity for this product
        //display confirmation message that another product quantity has been added
        Message('Another item has been added to your shopping cart','success');
    }
    else{
        // new product to put into cart or first time 
        include("./inc/dbconnect.php");
        //getPriceByProductId
        $productService=new productService($dbc);
    $getPriceByProductIdResult=$productService->getPriceByProductId($product_id);
        if($getPriceByProductIdResult['status']==0){
            $_SESSION['cart'][$product_id]=array(
                'quantity'=>1,
                'price'=>$getPriceByProductIdResult['value']
            );
            Message('A new item has been added to your shopping cart','success');
        }
        else if($getPriceByProductIdResult['status']==111){
            Message('Error: could not get price by product ID','warning');
        }
        mysqli_close($dbc);
    }
}
else{
    Message('Error: incorrect url format','warning');
}
ButtonGroup(['continueShopping','viewCart']);
// echo '<p class="indent"><a href="previous.html" onClick="history.back();return false;"><button id="contbutton">Continue Shopping</button></a>
// <a href="viewcart.php"><button id="viewbutton">View Cart</button></a>
// </p></div></div>';

require("./inc/footer.php");

?>