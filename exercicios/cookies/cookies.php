<?php
if (isset($_POST['enviar'])) {
    error_reporting(0);
    $prazo = time() + (24 * 60 * 60); //o cookie recebe o prazo em segundos
    setcookie('nome', $_POST['nome'], $prazo);
    setcookie('morada', $_POST['morada'], $prazo);
    setcookie('idade', $_POST['idade'], $prazo);
}

echo '
<!doctype html>
<html>

<head>
    <title>PHP HTTP</title>
</head>

<body>
    <form method="POST" action="cookies.php">
        <p><input type="text" name="nome" placeholder="Nome" value="' . htmlentities($_COOKIE['nome']) . '" ></p>
        <p><input type="text" name="morada" placeholder="Morada" value="' . htmlentities($_COOKIE['morada']) . '" ></p>
        <p><input type="number" name="idade" placeholder="Idade" value="' . htmlentities($_COOKIE['idade']) . '"></p>
        <p><input type="checkbox" name="animal">Tem animal de estimação</p>
        <p><input type="submit" value="Enviar" name="enviar"></p>
    </form>
</body>

</html>'

?>