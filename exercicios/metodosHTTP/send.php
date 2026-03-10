<?php
print_r($_POST);
?>

<!doctype html>
<html>

<head>
    <title>PHP HTTP</title>
</head>

<body>
    <form method="POST" action="receive.php">
        <p><input type="text" name="nome" placeholder="Nome"></p>
        <p><input type="text" name="morada" placeholder="Morada"></p>
        <p><input type="number" name="idade" placeholder="Idade"></p>
        <p><input type="checkbox" name="animal">Tem animal de estimação</p>
        <p><input type="submit" value="Enviar"></p>
    </form>
</body>

</html>