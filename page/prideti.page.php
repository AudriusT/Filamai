<?php
try{
    require "inc/config.php";
    require "inc/common.php";

    $connection = new PDO($dsn, $username, $password, $options);

    $sql = "INSERT INTO filmai (Pavadinimas, Aprašymas, Zanro_id, Premjeros_data)
             VALUES (:Pavadinimas, :Aprašymas, :Zanro_id, :Premjeros_data)";

    $query = $pdo->prepare($sql);
    $query->execute([
            ':pavadinimas' => $_POST['pavadinimas'],
        ':aprasymas' => $_POST['aprasymas'],
        ':zanro_id' => $_POST['zanras'],
        ':premjeros_data' => $_POST['premjeros_data'],
    ]);
}catch (Exception $e){
    echo"Veiksmu atlikti neina";
    exit;
}
$addGenre = $sql->fetch();

?>

<div class="bs-add-films" data-example-id="basic-forms">
    <form>
        <div class="form-group"><label for="pavadinimas">Filmo pavadinimas:</label>
            <input type="text" class="form-control" name="pavadinimas" id="pavadinimas">
        </div>
        <div class="form-group"><label for="aprasymas">Filmo aprašymas:</label>
            <input type="text" class="form-control" name="aprasymas" id="aprasymas">
        </div>

        <div class="form-group"> <label for="zanro_id">Filmo žanras:</label>
            <select class="form-control" name="zanras">
                <option value="zanro-pasirinkimas" selected disabled>Pasirinkite žanrą</option>
            <?php foreach ($genres as $genre): ?>
                <option value="<?=$genre['id']?>"><?=$genre['zanras']?></option>
                <?php endforeach; ?>
            </select>
            <div class="form-group"><label for="premjeros_data">Premjeros data</label>
                <input type="text" class="form-control" name="premjeros_data" id="premjeros_data">
            </div>
            <input type="submit" value="Pridėti">
        </div>
    </form>
</div>