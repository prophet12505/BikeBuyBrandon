<?php
    // $arr essentially is an object(or map)
    // render card function 
    function Card($arr){
        // maximun title characters
    $limit = 65;
        //will truncate the string if it exceeds the limit, otherwise add spaces util it reach the limits
        //make sure the titles' length are consistent across different products
    $arr["product_name"]=(strlen($arr['product_name']) > $limit) ? substr($arr['product_name'], 0, $limit) . " ..." : $arr['product_name'] . str_repeat(" ", $limit - strlen($arr['product_name']));
    // print_r($arr);
        echo (
            '
            <div class="card mt-3 mx-2" >
                <div class="card-body">
                <h5 class="card-title">'.$arr["product_name"].'</h5>
                <p class="card-text card-price">$'.$arr['price'].'</p>
                <img class="card-img-top" src="'.$arr['image_url'].'" alt="Card image cap"><br>
                <a href="./addToCart.php?product_id='.$arr['product_id'].'" class="btn btn-warning btn-add-to-cart">Add to cart</a>
                </div>
            </div>
            '
        );
    }
?>