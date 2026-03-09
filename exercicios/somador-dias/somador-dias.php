<?php

function somadorDias($dias){
    $dataAtual = date("d-m-y", strtotime('now'));
    $dataFutura = date( "d-m-y", strtotime("+$dias day"));

    return [$dataAtual, $dataFutura];
}



$diasAFrente = 40;
$data = somadorDias($diasAFrente);

echo "$diasAFrente dias a frente de $data[0] será $data[1]";
;