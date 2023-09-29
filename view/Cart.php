<?php
    function Cart(){
        echo '<section class="cart"><p id="cartdir">To delete an item from your cart, you can click the remove link or enter 0 for quantity and click update cart below</p>
        <form action="viewcart.php" method="post">
        <table class="cart">
            <tr class="titles">
            <th>Product</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th></th>
        </tr>';

    }


?>