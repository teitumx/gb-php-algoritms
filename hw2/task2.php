<?php
// 1. n * log2(n) = O(n*log(n))
$n = 10000;
$array[] = [];

for ($i = 0; $i < $n; $i++) {
    for ($j = 1; $j < $n; $j *= 2) {
        $array[$i][$j] = true;
    }
}

// 2. n/2 * n = O(n^2)
$n = 10000;
$array[] = [];

for ($i = 0; $i < $n; $i += 2) {
    for ($j = $i; $j < $n; $j++) {
        $array[$i][$j] = true;
    }
}
