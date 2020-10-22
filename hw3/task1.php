<?php

$array = [1, 2, 4, 5, 6];

function findElement($array)
{
    $left = 0;
    $right = count($array) - 1;

    while ($left < $right) {
        $center = (int)floor(($right + $left) / 2);
        if ($array[$center] == $center + 1)
            $left = $center + 1;
        else
            $right = $center - 1;
    }
    return $left + 1;
}


echo "Пропущен элемент с индексом: " . findElement($array);
