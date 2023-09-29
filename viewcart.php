<?php
    //notice : you don't need to login to add to cart 
    //start the session and then include the header
    //to be modified
    session_start();

    $title="Shopping cart | by Sean";
    $self=basename($_SERVER['PHP_SELF']);
    include("./inc/header.php");
    include("./view/Cart.php");
    include("./service/ProductService.php");

    // display page title
	//echo '<div class="w3-container w3-teal"><h1>' . $title . '<a href="viewcart.php"><i class="fas fa-shopping-cart" id="carticon" title="View Cart"></i></a></h1></div>';

    //display cart if not empty
    // new instance of product service 
    if($_SESSION['cart']){
        require("./inc/dbconnect.php");
        $productService = new ProductService($dbc);
        Cart($_SESSION['cart'],$productService->getCartItems($_SESSION['cart']));
        // if(mysql_num_rows(result)>0){
        //     mysqli_fetch_assoc($result);
        // }
        // else{
        // }
    }

    include("./inc/footer.php");






?>