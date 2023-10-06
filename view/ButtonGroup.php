<?php
function ButtonGroup($arr)
{
    
    echo ('<div class="mt-2 btn-group" role="group" aria-label="Basic example">');
    if (in_array('backToIndex', $arr)) 
        echo ('   <a href="./index.php" class="btn btn-primary">' .'Back to Shopping'. '</a>');
    echo ('</div>');
}
?>