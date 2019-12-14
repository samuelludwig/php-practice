<?php
$arr = array(1, 2, 3, 4, 5);
print_array($arr);
echo "\n";

array_map("times_two", $arr);
print_array($arr);
echo "\n";

$arr = array_map("times_two", $arr);
print_array($arr);
echo "\n";

function print_value($x) { echo (string) $x . "\n"; }

function print_array(array $arr) {
    foreach($arr as $item) { print_value($item); }
}

function times_two($int) { return $int * 2; }
?>
