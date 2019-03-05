<?php
try{
    require "../config.php";
    require "../common.php";

    $connection = new PDO($dsn, $username, $password, $options),

    $sql = "INSERT INTO filmai (Pavadinimas, Aprašymas, Zanro_id, Premjeros_data)
             VALUES (:Pavadinimas, :Aprašymas, :Zanro_id, :Premjeros_data)";

    $query = $pdo->
}




<form>
    <label for="pavadinimas">Filmo pavadinimas:</label>
    <input type="text" name="pavadinimas" id="pavadinimas">
    <label for="zanras">Filmo žanras:</label>
    <input type="text" name="zanras" id="zanras">
    <label for="data">Filmo data:</label>
    <input type="text" name="data" id="data">
    <input type="submit" value="Pridėti">
</form>