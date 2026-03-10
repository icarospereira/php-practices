<html>

<body>
    <?php
    echo "<p>Nome:" . $_POST['nome'] . "</p>";
    echo "<p>Morada:" . $_POST['morada'] . "</p>";
    echo "<p>Idade:" . $_POST['idade'] . "</p>";
    if (isset($_POST['animal'])) {
        echo "<p>Tem animal de estimação</p>";
    } else {
        echo "<p>Não tem animal de estimação</p>";
    }
    ?>
</body>

</html>