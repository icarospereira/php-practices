<?php

class Equipa {
    private $nome;
    private $ganhos;
    private $perdidos;

    function __construct($nome, $ganhos, $perdidos){
        $this->nome = $nome;
        $this->ganhos = $ganhos;
        $this->perdidos = $perdidos;
    }
    
    function lerNome(){
        return $this->nome;
    }
    
    function lerGanhos(){
        return $this->ganhos;        
    }

    function lerPerdidos(){
        return $this->perdidos;
    }

    function qualidade(){
        $jogos = $this->ganhos + $this->perdidos;
        return round(($this->ganhos/$jogos)*100, 1);
    }

    function somarVitória(){
        $this->ganhos += 1;
    }

    function somarDerrota(){
        $this->perdidos += 1;
    }
}


$porto_fc = new Equipa("Porto FC", 8, 3);
$benfica = new Equipa("Benfica", 5, 6);
echo "O ".$porto_fc->lerNome()." tem ".$porto_fc->lerGanhos()." vitórias e ".$porto_fc->lerPerdidos()." derrotas, com ".$porto_fc->qualidade()."% de aproveitamento. <br>";
echo "O ".$benfica->lerNome()." tem ".$benfica->lerGanhos()." vitórias e ".$benfica->lerPerdidos()." derrotas, com ".$benfica->qualidade()."% de aproveitamento. <br>";
;