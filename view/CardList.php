<?php
include('./view/Card.php');
function CardList($shopCardListArray)
{
    echo '<div class="row justify-content-center  " >';
    echo '<div class="row justify-content-start  " id="shoplist">';
    // render card function 
    for ($i = 0; $i < count($shopCardListArray); $i++) {
        //render a bootstrap column for each grid
        Card($shopCardListArray[$i]);
    }
    echo '</div>';
    echo '</div>';
}

?>