<?php

$fruits = array("apple","banana","pear");
$numbered = array("apple","2","3","4","2","3","4");
$cards = array_merge($fruits, $numbered);
print_r($numbered);
$array = array_unique($numbered);
print_r($array);

// output
// Array ( [0] => apple [1] => banana [2] => pear [3] => 1 [4] => 2 [5] => 3 )



?>