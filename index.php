<?php
$data=[
    ['Иванов','Математика',5],
    ['Иванов','Математика',4],
    ['Иванов','Математика',5],
    ['Петров','Математика',5],
    ['Сидоров','Физика',4],
    ['Иванов','Физика',4],
    ['Петров','ОБЖ',4],

];
array_multisort($data);

$result = array();

$lessons =array_values(array_unique(array_column($data,1)));
array_multisort($lessons);
array_map(function ($item) use (&$result,$lessons) {
    $result[$item[0]][$item[1]] =
        isset($result[$item[0]][$item[1]])
            ? $result[$item[0]][$item[1]] + $item[2] : $item[2];
}, $data);

include 'view.php';
?>
