<?php
//msgType: success, warning, info
// render message component 
function Message($msg,$msgType){
    echo'<div class="m-0 alert alert-'.$msgType.'" role="alert">'
    .$msg.'</div>';
}
?>