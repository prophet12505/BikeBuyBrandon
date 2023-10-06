<?php
function ButtonGroup($arr)
{
    
    echo ('<div class="btn-group" role="group" aria-label="Basic example">');
    if (in_array('backToIndex', $arr)) 
        echo ('   <button type="button" class="btn btn-primary">' .'Back to Shopping'. '</button>');
    echo ('</div>');
}
?>