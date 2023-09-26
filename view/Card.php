<?php
    // $arr essentially is an object(or map), this is the schema of it
    // $arr(
    //     "product_name" => "title of the good",
    //     "price" => "price of the good",
    //     "image_url" => "url of the image"
    // ),
    // render card function 
    function Card($arr){
        // maximun title characters
    $limit = 65;
        //will truncate the string if it exceeds the limit, otherwise add spaces util it reach the limits
        //make sure the titles' length are consistent across different products
    $arr["product_name"]=(strlen($arr['product_name']) > $limit) ? substr($arr['product_name'], 0, $limit) . " ..." : $arr['product_name'] . str_repeat(" ", $limit - strlen($arr['product_name']));
        echo (
            '
            <div class="card" style="width: 18rem;">
                <div class="card-body">
                <h5 class="card-title">'.$arr["product_name"].'</h5>
                <p class="card-text card-price">$'.$arr['price'].'</p>
                <img class="card-img-top" src="'.$arr['image_url'].'" alt="Card image cap"><br>
                <a href="#" class="btn btn-warning btn-add-to-cart">Add to cart</a>
                </div>
            </div>
            '
        );
    }
?>