<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if (isset($_POST['botao'])) {

    $diretorioDestino = "uploads/";

    if (!is_dir($diretorioDestino)) {
        mkdir($diretorioDestino, 0777, true);
    }
    
    $nomeTemporario = $_FILES["ficheiro"]["tmp_name"];
    $nomeReal = $_FILES["ficheiro"]["name"];
    $tamanhoArquivo = $_FILES["ficheiro"]["size"];

    //Mais segurança é necessária, mas manterei assim pra didática

    

    $extensao = strtolower(pathinfo($nomeReal, PATHINFO_EXTENSION));

    $extensoesPermitidas = ['txt', 'xml'];

    if (!in_array($extensao, $extensoesPermitidas)) {
        die("Erro: Apenas arquivos txt e xml são permitidos.");
    }

    $nomeUnico = uniqid()."_".$nomeReal;

    $caminhoFinal = $diretorioDestino . $nomeUnico;

    if (move_uploaded_file($nomeTemporario, $caminhoFinal)) {        
        echo "Sucesso! O arquivo foi salvo em: " . $caminhoFinal;
    } else {
        echo "Erro ao enviar o arquivo.";
    }

}else{ echo "Não foi enviado arquivo.";}
?>

<!doctype html>
<html>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <p align="center">Ficheiro:
            <input name="ficheiro" type="file" id="ficheiro">
        </p>
        <p align="center">
            <input name="botao" type="submit" value="Enviar">
        </p>
    </form>
</body>

</html>