<?php
function fatorial($value)
{
    
    $fatorial = 1;

    if ($value > 0) {
        $fatorial = $value * fatorial($value - 1);        
    }

    return $fatorial;
}
;

$value = 5;
$fatorial = fatorial($value);

echo $fatorial;