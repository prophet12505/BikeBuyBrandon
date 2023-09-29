<?php
    //notice : you don't need to login to add to cart 
    //start the session and then include the header
    //to be modified
    session_start();

    $title="Shopping cart | by Sean";
    $self=basename($_SERVER['PHP_SELF']);
    include("./inc/header.php");

    // display page title
	echo '<div class="w3-container w3-teal"><h1>' . $page_title . '<a href="viewcart.php"><i class="fas fa-shopping-cart" id="carticon" title="View Cart"></i></a></h1></div>';

    //display cart if not empty

    if($_SESSION['cart']){
        require("./inc/dbconnect.php");
        

        

        $total=0;
        //convert it to an associative array to decouple view and service layer
        //under work
        // $data = array();
        // while ($row = mysqli_fetch_assoc($result)) {
        // $data[] = $row;
        // }
        //loop through the cart
        while($row=mysqli_fetch_array($result,MYSQLI_ASSOC)){
            //calculate subtotals and total
            // $subtotal=$_SESSION['cart'][$row['prod_id']]['quantity']*$row['prod_price'];
            $subtotal=$_SESSION['cart'][$row['prod_id']]['quantity']*$_SESSION['cart'][$row['prod_id']]['price'];
            $total+=$subtotal;
            $_SESSION['total']=$total;//put total into session for storage to DB later
            // print the row
            echo "<tr>
            <td class='imageSlot'><a href='viewproduct.php?prod_id={$row['prod_id']}'><img src='{$row['prod_img']}' width='150'></a>
            </td>
            <td><a href='viewproduct.php?prod_id={$row['prod_id']}'>{$row['prod_name']}</a></td>
            <td>\${$_SESSION['cart'][$row['prod_id']]['price']}</td>
            <td><input type='number' min='0' max='20' name='qty[{$row['prod_id']}]' value='{$_SESSION['cart'][$row['prod_id']]['quantity']}'</td>
            <td>\$".number_format($subtotal,2)."</td>
            <td><a href='viewcart.php?prod_id={$row['prod_id']}'>Remove</a></td>
            </tr>
            ";


            // echo '<tr>
            // <td><img src="'.$row['prod_img'].'" class="cartimg"></td>
            // <td>'.$row['prod_name'].'</td>
            // <td>$'.$row['prod_price'].'</td>
            // <td><input type="text" name="quantity['.$row['prod_id'].']" value="'.$_SESSION['cart'][$row['prod_id']]['quantity'].'"></td>';
        }
        mysqli_close($dbc);
        // print the total and close the table 
        echo "<tr class='totalLine w3-camo-red'>
            <td colspan='4'><p id='totallabel'>Total:</p></td>
            <td><p id='total'>$". number_format($total,2)."</p></td>
            <td></td>
            </tr>
            </table>
            ";
        // if(mysql_num_rows(result)>0){
        //     mysqli_fetch_assoc($result);
        // }
        // else{

        // }
    }

    include("./inc/footer.php");






?>