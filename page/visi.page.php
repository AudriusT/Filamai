<?php

try {
    $pdo = new PDO($dsm, $users, $pass, $options);
}catch (Exception $e) {
    echo "Negaliu prisijungti prie DB<br>";
    echo $e->getMessage();
    exit;
}
try {
    $stm = $pdo->query( 'SELECT * FROM movies');
}catch (Exception $e) {
    echo "Klaida: Negaliu gauti duomenų iš DB";
    exit;
}
$data = $stm->fetchAll();


$pdo = null;
?>
<table class="table table-bordered table-responsive">
<?php foreach($data as $item):?>
<tr>
    <td><?=$item['title'];?> </td>
    <td><?=$item['decription'];?> </td>
     <td><a href="?action=delete&id=<?=$item['id'];?>">Delete</a></td>
</tr>
    <?php endforeach;?>
</table>
