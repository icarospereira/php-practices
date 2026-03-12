<?php
function connect()
{
    $_dbPort = '3306';
    $_dbName = 'db_countries';
    $_dbUser = 'root';
    $_dbPassword = 'root';
    return new PDO("mysql:host=127.0.0.1; port=$_dbPort; dbname=$_dbName", $_dbUser, $_dbPassword);
}

function listProvinces($pdo, $country)
{
    if (!$country) {
        throw new Exception("Não há país selecionado.");
    }

    $sql = "SELECT province FROM tbl_provinces 
            INNER JOIN tbl_countries 
            ON tbl_provinces.country_id = tbl_countries.id 
            WHERE tbl_countries.country = :country";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([':country' => $country]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);

}



try {
    $pdo = connect();    
    $country = $_GET['country'] ?? null;
    if (!$country) {
        throw new Exception("Parâmetro 'country' é obrigatório.");
    }
    $getData = listProvinces($pdo, $country );    
    echo json_encode($getData);
} catch (Exception $e) {
    print($e);
}
;