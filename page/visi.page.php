<?php

try {

    $pdo = new PDO($dsn, $user, $pass, $options);
}catch (Exception $e) {
    echo "Negaliu prisijungti prie DB<br>";
    echo $e->getMessage();
    exit;
}

try {
    $stmt = $pdo->query( 'SELECT * FROM filmai INNER JOIN zanrai ON filmai.Zanro_id = zanrai.id ');
}catch (Exception $e) {
    echo "Klaida: Negaliu gauti duomenų iš DB";
    exit;
}

if (isset($_POST['ID'])){
    $pdo = new PDO($dsn, $user, $pass, $options);
    $sql = "DELETE FROM filmai WHERE ID = {$id}";

if ($id->query($sql) === TRUE) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . $id->error;
}
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
    <td><a href="?page=visi&id=<?=$item['ID'];?>">Ištrinti</a></td>
</tr>
    <?php endforeach;?>
</table>