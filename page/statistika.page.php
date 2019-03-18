<?php

$pdo = new PDO($dsn,$user,$pass,$options);

try {
    $db_query = $pdo->query('SELECT * FROM zanrai');
} catch (\PDOException $e) {
    echo "Klaida, duomenu gauti neimanoma";
    exit;
}
$genres = $db_query->fetchAll();

$list="<ul class=\"list-group\">";
foreach($genres as $zanras){
    try {
        $stmt = $pdo->prepare("SELECT * from filmai inner join zanrai on filmai.zanro_id = zanrai.Id WHERE zanrai.Id = :id;");
        $stmt->bindParam(':id', $zanras['Id'], PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e){
        echo "Duomenu gauti neimanoma";
    }
    $filmList = $stmt->fetchAll();

    if($stmt!=null){
        $number = count($filmList);
        $list .= "<li class=\"list-group-item\">{$zanras['Zanrai']} <span class=\"badge\">({$number})</span></li>";
} else {
        $list .= "<li class=\"list-group-item\">{$zanras['Zanrai']} <span class=\"badge\">(0)</span></li>";
}
}
echo $list . "</ul>";

$pdo = null;