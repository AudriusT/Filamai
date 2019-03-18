<?php

try {

    $pdo = new PDO($dsn, $user, $pass, $options);
}catch (Exception $e) {
    echo "Negaliu prisijungti prie DB<br>";
    echo $e->getMessage();
    exit;
}

try {
    $stmt = $pdo->query( 'SELECT * FROM filmai INNER JOIN zanrai
 ON filmai.Zanro_id = zanrai.id ');
}catch (Exception $e) {
    echo "Klaida: Negaliu gauti duomenų iš DB";
    exit;
}

$data = $stmt ->fetchAll();

$pdo = null;
?>


<table class="table table-bordered table-responsive">
    <tr>
        <td>Pavadinimas</td>
        <td>Aprašymas</td>
        <td>Žanras</td>
        <td>Premjeros data</td>
    </tr>
<?php foreach($data as $item):?>

<tr>
    <td><?=$item['Pavadinimas'];?> </td>
    <td><?=$item['Aprasymas'];?> </td>
    <td><?=$item['Zanras'];?></td>
    <td><?=$item['Premjeros_data'];?></td>
    <td><a href="?page=delete&ID=<?=$item['ID'];?>">Ištrinti</a></td>
    <td><a href="?page=redaguoti&ID=<?=$item['ID'];?>">Redaguoti</a></td>
</tr>
    <?php endforeach;?>
</table>