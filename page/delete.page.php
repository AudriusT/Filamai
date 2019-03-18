<?php
$id = $_GET['ID'];
try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    echo "can't connect";
    throw new PDOException($e->getMessage(), (int)$e->getCode());
    exit;
}
try{
    $stmt = $pdo->query("DELETE FROM filmai WHERE ID = $id ");
}
catch(Exception $e){
    echo "Nėra duomenų";
    exit;
}
header('Location: ?page=visi');