<?php
function ButtonGroup($arr)
{
    echo ('<div class="mt-2 btn-group" role="group" aria-label="Basic example">');
    if (in_array('backToIndex', $arr))
        echo ('   <a href="./index.php" class="btn btn-primary me-2">' . 'Back to Shopping' . '</a> ');
    if (in_array('continueShopping', $arr))
        echo ('   <a href="./index.php" class="btn btn-warning me-2">' . 'Continue Shopping' . '</a> ');
    if (in_array('viewCart', $arr))
        echo ('   <a href="./viewcart.php" class="btn btn-secondary me-2">' . 'View Cart' . '</a> ');
    if (in_array('logout', $arr))
        echo ('   <a href="./logout.php" class="btn btn-secondary me-2">' . 'Logout' . '</a> ');

    echo ('</div>');
}
?>