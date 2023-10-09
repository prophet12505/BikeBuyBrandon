<?php
    //notice : you don't need to login to add to cart 
    //start the session and then include the header
    //to be modified
    // session_start();

    $title="Shopping cart | by Sean";
    $self=basename($_SERVER['PHP_SELF']);
    include("./inc/header.php");
    include("./view/Cart.php");
    include("./view/Message.php");
    include("./service/ProductService.php");
    //update cart
    if(isset($_POST['submit'])){
        //clear the original array
        //JSON format:
            // {
            //     "qty": {
            //       "product_id_1": "quantity_1",
            //       "product_id_2": "quantity_2",
            //       ...
            //     }
            //   }
        //read the post from the page and write it to the session
        $quantity = $_POST['qty'];
        foreach($_SESSION['cart'] as $key=> $value){
            //clear out all quantities
            $value['quantity']=0;
        }
        foreach($quantity as $key=> $value){
            $_SESSION['cart'][$key]['quantity'] = $value;
        }
        foreach($_SESSION['cart'] as $key=> $value){
            //clear out all quantities
            if($value['quantity']==0){
                unset($_SESSION['cart'][$key]);
            }
        }
    }
    if(isset($_GET['product_id']) && isset($_SESSION['cart'][$_GET['product_id']])){
        unset($_SESSION['cart'][$_GET['product_id']]);
    }


    // display page title
	//echo '<div class="w3-container w3-teal"><h1>' . $title . '<a href="viewcart.php"><i class="fas fa-shopping-cart" id="carticon" title="View Cart"></i></a></h1></div>';

    //display cart if not empty
    // new instance of product service 
    if(isset($_SESSION['cart'])){
        require("./inc/dbconnect.php");
        $productService = new ProductService($dbc);
        print_r($_SESSION['cart']);
        print_r("\n");
        print_r($productService->getCartItems($_SESSION['cart'])['value']);
    
        $getCartItemsResult=$productService->getCartItems($_SESSION['cart']);
        if($getCartItemsResult['status']==0)
            Cart($_SESSION['cart'],$getCartItemsResult['value']);
        else{
            Message('Sorry, they were no cart items found','warning');
        }
        //make an http 
        mysqli_close($dbc);
    }
    else{
        Message('Sorry, they were no cart items found','warning');
    }

    include("./inc/footer.php");






?>