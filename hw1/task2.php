<?php

$n = 600851475143;

$splStack = new SplStack();
for ($i = $n - 1; $i >= 1; $i--) {

    if ($n % $i == 0) {
        $splStack->push($i);
        break;
    }
}

echo $splStack->top();
