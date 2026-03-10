<html>

<body>
    <p>
        <?php
        // a função permite saber se o ficheiro existe ou não
        if (file_exists('file.xml')) {
            libxml_use_internal_errors(true);
            $xml = simplexml_load_file('file.xml');
            if (!$xml) {
                echo "Erro ao carregar o XML<br/>";
                foreach (libxml_get_errors() as $error) {
                    echo "<br/>&nbsp;-&nbsp;", $error->message;
                }

            } else {
                echo $xml->filmes->filme->titulo . "<br>";
                foreach ($xml->filmes->filme->personagens->personagem as $personagem) {
                    echo "$personagem->nome,  interpretado por , $personagem->ator <br>";
                }
                foreach ($xml->xpath('//pontuacao') as $pontuacao) {
                    switch ((string) $pontuacao['tipo']) {
                        // considera os atributos como índices do elemento
                        case 'polegares':
                            echo $pontuacao, ' votos positivos <br>';
                            break;
                        case 'estrelas':
                            echo $pontuacao, ' estrelas <br>';
                            break;
                    }
                }
            }
        } else {
            exit('Erro ao abrir file.xml.');
        }

        ?>
    </p>
</body>

</html>