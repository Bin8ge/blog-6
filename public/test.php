<?php
//var_dump(0.1+0.7==0.8);
//var_dump(0.0==0);
//var_dump(==0);


$a = 0;
$b = 0;

if($a=3>0 || $b=3>0) {
    $a++;
    $b++;
//    echo $a;
//    echo '<br/>';
//    echo  $b;
}

$count = 5;

function get_count()
{
    static $count;



    return $count++;
}

//
//var_dump($count) ;
//var_dump(++$count) ;
//var_dump(get_count()) ;
//echo '<br/>';
//echo get_count();


function Test()
{
    static  $count = 0;
    $count++;
    echo $count;
    if ($count < 10) {
        var_dump($count);
        Test();
    }
    $count--;
}

//echo Test();

$data = ['a','b','c'];

foreach ($data as $key => $val) {
    $val =& $data['$key'];
    print_r($data);
}

