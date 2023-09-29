<?php
    //to be tested
    function Cart($cart,$cartItemList){
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

        foreach($cartItemList as $row){
            $total=0;
        //convert it to an associative array to decouple view and service layer
        //under work
        //loop through the cart
        
            //calculate subtotals and total
            // $subtotal=$cart[$row['prod_id']]['quantity']*$row['prod_price'];
            $subtotal=$cart[$row['prod_id']]['quantity']*$cart[$row['prod_id']]['price'];
            $total+=$subtotal;
            $_SESSION['total']=$total;//put total into session for storage to DB later
            // print the row
            echo "<tr>
            <td class='imageSlot'><a href='viewproduct.php?prod_id={$row['prod_id']}'><img src='{$row['prod_img']}' width='150'></a>
            </td>
            <td><a href='viewproduct.php?prod_id={$row['prod_id']}'>{$row['prod_name']}</a></td>
            <td>\${$cart[$row['prod_id']]['price']}</td>
            <td><input type='number' min='0' max='20' name='qty[{$row['prod_id']}]' value='{$cart[$row['prod_id']]['quantity']}'</td>
            <td>\$".number_format($subtotal,2)."</td>
            <td><a href='viewcart.php?prod_id={$row['prod_id']}'>Remove</a></td>
            </tr>
            ";
            // echo '<tr>
            // <td><img src="'.$row['prod_img'].'" class="cartimg"></td>
            // <td>'.$row['prod_name'].'</td>
            // <td>$'.$row['prod_price'].'</td>
            // <td><input type="text" name="quantity['.$row['prod_id'].']" value="'.$cart[$row['prod_id']]['quantity'].'"></td>';
        }
         // print the total and close the table 
         echo "<tr class='totalLine w3-camo-red'>
         <td colspan='4'><p id='totallabel'>Total:</p></td>
         <td><p id='total'>$". number_format($total,2)."</p></td>
         <td></td>
         </tr>
         </table>
         ";

    }


?>