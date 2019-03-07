<?php
try{
    require "inc/config.php";
    require "inc/common.php";

    $connection = new PDO($dsn, $user, $pass, $options);

    $sql = "SELECT *
    FROM users
    WHERE location = :location";

    $statement = $pdo->prepare($sql);
    $statement->bindParam(':location', $_GET['location'], PDO::PARAM_STR);
    $statement->execute();

    $result = $statement->fetchAll();
}

catch(PDOException $error){
    echo $sql . "<br>" . $error->getMessage();
}
$addGenre = $sql->fetch();

?>




<form>
    <label for="pavadinimas">Filmo pavadinimas:</label>
    <input type="text" name="pavadinimas" id="pavadinimas">
    <label for="zanras">Filmo žanras:</label>
    <input type="text" name="zanras" id="zanras">
    <label for="data">Filmo data:</label>
    <input type="text" name="data" id="data">
    <input type="submit" value="Ieškoti">
</form>