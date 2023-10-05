<?php
    //to be tested
    function Cart($cart,$cartItemList){
        echo '<section class="cart"><p id="cartdir">To delete an item from your cart, you can click the remove link or enter 0 for quantity and click update cart below</p>
        <form action="./viewcart.php" method="post">
        <table class="cart">
            <tr class="titles">
            <th>Product</th>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Subtotal</th>
            <th></th>
        </tr>';
        $total=0;
        foreach($cartItemList as $row){
            
        //convert it to an associative array to decouple view and service layer
        //under work
        //loop through the cart
        
            //calculate subtotals and total
            // $subtotal=$cart[$row['product_id']]['quantity']*$row['prod_price'];
            $subtotal=$cart[$row['product_id']]['quantity']*$cart[$row['product_id']]['price'];
            $total+=$subtotal;
            $_SESSION['total']=$total;//put total into session for storage to DB later
            // print the row
            echo "<tr>
            <td class='imageSlot'><a href='viewproduct.php?product_id={$row['product_id']}'><img src='{$row['image_url']}' width='150'></a>
            </td>
            <td><a href='viewproduct.php?product_id={$row['product_id']}'>{$row['product_name']}</a></td>
            <td>\${$cart[$row['product_id']]['price']}</td>
            <td><input class='quantity' type='number' min='0' max='20' name='qty[{$row['product_id']}]' value='{$cart[$row['product_id']]['quantity']}'></td>
            <td>\$".number_format($subtotal,2)."</td>
            <td><a href='viewcart.php?product_id={$row['product_id']}'>Remove</a></td>
            </tr>
            ";

        }
         // print the total and close the table 
        echo "<tr class='totalLine w3-camo-red'>
        <td colspan='4'><p id='totallabel'>Total:</p></td>
        <td><p id='total'>$". number_format($total,2)."</p></td>
        <td></td>
        </tr>
        </table>
        ";

        echo '<input type="submit" name="submit" value="Update Cart"  class="btn btn-primary">';

    }


?>