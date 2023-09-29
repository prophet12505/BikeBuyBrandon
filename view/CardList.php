<?php
        include('./view/Card.php');
        echo '<div class="row justify-content-around " id="shoplist">';
            function CardList($shopCardListArray){

                // render card function 
                for ($i = 0; $i < count($shopCardListArray); $i++) {
                    //render a bootstrap column for each grid
                    Card($shopCardListArray[$i]);
                }
            }
        //to be debuged
        // echo '</div>';
    
?>