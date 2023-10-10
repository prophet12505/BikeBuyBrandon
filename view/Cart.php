<?php
//to be tested
function Cart($cart, $cartItemList)
{
    //display page title
    // <i class="fas fa-shopping-cart" id="carticon" title="View Cart"></i>
    echo '<div class="row d-flex justify-content-center">
    <h1>Your Cart<a href="viewcart.php"></a></h1></div>';
    echo '<section class="cart"><p id="cartdir">To delete an item from your cart, you can click the remove link or enter 0 for quantity and click update cart below</p>
    <form action="./viewcart.php" method="post">
    <table class="table table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Product</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th></th>
            </tr>
        </thead>
        <tbody>';
    $total = 0;
    foreach ($cartItemList as $row) {
        // Calculate subtotals and total
        $subtotal = $cart[$row['product_id']]['quantity'] * $cart[$row['product_id']]['price'];
        $total += $subtotal;
        $_SESSION['total'] = $total; // Put total into session for storage to DB later
        // Print the row
        echo "<tr>
            <td class='imageSlot'><a href='viewproduct.php?product_id={$row['product_id']}'><img src='{$row['image_url']}' width='150'></a></td>
            <td ><p class='h6'>{$row['product_name']}</p></td>
            <td>\${$cart[$row['product_id']]['price']}</td>
            <td><input class='form-control' type='number' min='0' max='20' name='qty[{$row['product_id']}]' value='{$cart[$row['product_id']]['quantity']}'></td>
            <td>\$" . number_format($subtotal, 2) . "</td>
            <td><a href='viewcart.php?product_id={$row['product_id']}' class='btn btn-danger'>Remove</a></td>
            </tr>";
    }
    // Print the total and close the table 
    echo "<tr class='totalLine bg-dark text-white'>
        <td colspan='4'><p id='totallabel'>Total:</p></td>
        <td><p id='total'>$" . number_format($total, 2) . "</p></td>
        <td></td>
        </tr>
        </tbody>
    </table>";
    echo '<input type="submit" name="submit" value="Update Cart" class="btn btn-warning"> ';
    echo '<a href="./checkout.php" class="btn btn-secondary">Checkout</a>';
}




?>