<?php

$ip = $_SERVER['REMOTE_ADDR'];
$time = date('d-m-y h:i:s');
$porta = $_SERVER['REMOTE_PORT'];
$url = $_SERVER['REQUEST_URI'];

$conteudo = "
        IP: $ip\r\n
        Data e hora: $time\r\n
        Porta: $porta\r\n
        URL: $url \r\n  
";

$file = fopen('data.txt', 'w+');

fwrite($file, $conteudo);
fclose(($file));
echo "Conteúdo escrito e arquivo criado.";

?>