<?php
say_hi();

$hi = function(){ echo "An anonymous hello...\n"; };
$hi();

function say_hi() {
    echo "Hello" . "World!" . "\n";
}
?>
