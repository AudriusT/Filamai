<?php

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
}catch (Exception $e) {
    echo "Prisijungti prie DB neina";
    echo $e->getMessage();
}

try {
    $stmt = $pdo->query('SELECT * FROM zanrai');
} catch (Exception $e) {
    echo "Zanrų rasti neina";
    exit;
}
$genres = $stmt->fetchAll();
var_dump($genres);

    try {
        $db = $pdo->prepare('SELECT * FROM filmai WHERE zanrai.Id = :ID;');
        $db->execute([
            ':ID' => $genre[0]['Id']
        ]);
    } catch (\PDOException $e) {
        echo "Klaida: Negaliu gauti duomenų iš DB";
        exit;
    }
    $db->execute();
    $data = $db->fetchAll();
    $pdo = null;
?>

<table class="table table-bordered table-responsive">
    <tr>
        <td>Žanrai</td>
        <td>Filmų skaičius</td>
    </tr>
    <?php foreach($genres as $genre):?>

        <tr>
            <td><?=$genre['Zanras'];?></td>
            <?php foreach ($data as $fin):?>
            <td><?=$fin[''];?></td>
                 <?php endforeach;?>
            <td
        </tr>
    <?php endforeach;?>
</table>