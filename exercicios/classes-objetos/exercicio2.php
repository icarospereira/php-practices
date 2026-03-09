<?php

class Equipa
{
    private $nome;
    private $pontos;
    private $vitoria = 3;
    private $empate = 2;
    private $derrota = 1;

    function __construct($nome, $pontos){
        $this->nome = $nome;
        $this->pontos = $pontos;
    }

    function lerNome()
    {
        return $this->nome;
    }

    function lerPontos()
    {
        return $this->pontos;
    }

    function inserirPonto($cond)
    {
        switch ($cond) {
            case 'vitoria':
                return $this->pontos = $this->pontos + $this->vitoria;
            case 'empate':
                return $this->pontos = $this->pontos + $this->empate;
            case 'derrota':
                return $this->pontos = $this->pontos + $this->derrota;
        }
    }

    function __clone(){
        $this->vitoria = 4;
        $this->empate = 1;
        $this->derrota = 0;
    }

}

$Porto = new Equipa("Porto", 10);
$Porto_reg = clone $Porto;

$Porto->inserirPonto('vitoria');
$Porto_reg->inserirPonto('vitoria');

echo "O Porto Porf tem ".$Porto->lerPontos()."<br>";
echo "O Porto Reg tem ".$Porto_reg->lerPontos()."<br>";



;