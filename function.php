<?php
function countProductsInSession() {
    if(isset($_SESSION['products']) && is_array($_SESSION['products'])) {
        return count($_SESSION['products']);
    } else {
        return 0;
    }
}
?>
