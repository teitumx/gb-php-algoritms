<?php

// error_reporting(-1);
header('Content-Type: text/html; charset=utf-8');

$str1 = '"Это тестовый вариант проверки (задачи со скобками). И вот еще скобки: {[][()]}"';
$str2 = '((a + b)/ c) - 2';
$str3 = '"([ошибка)"';
$str4 = '"(")';


function checkBrackets($str)
{
    $charArr = str_split($str);
    $brackets = [']' => '[', ')' => '(', '}' => '{'];
    $closing = array_keys($brackets);

    $splStack = new SplStack();

    foreach ($charArr  as $key) {
        if (!in_array($key, $closing)) {
            $splStack->push($key);
            continue;
        }
        if ($splStack->top() != $brackets[$key]) {
            echo 'false';
        }
        echo 'true';
    }
}



checkBrackets($str3);
