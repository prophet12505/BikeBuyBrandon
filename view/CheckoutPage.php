<?php
    function CheckoutPage($ordernum,$to,$displaydst,$do,$total){
        
        echo "<div class='w3-container w3-camo-sandstone'><h2>Your bike is on the way!</h2>";

        echo "<p class='indent'>Your order number is <span class='w3-camo-red'><i>" . date("Y") . "-$ordernum</i></span> placed at $to $displaydst on $do. The total of your order was <span class='w3-camo-red'><i>$" . number_format($total, 2) . "</i></span>. Thank you for purchasing from Bikebuy and we  hope to 'see' you again real soon!</p><div class='logout'><p class='indent'><a href='logout.php'><button>Logout</button></a></p></div></div><img src='./img/site/success.jpg' id='successimg'>";


    }

?>