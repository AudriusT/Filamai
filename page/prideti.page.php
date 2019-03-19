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
$pdo = null;

if (isset($_POST['submit'])) {
    $pdo = new PDO($dsn, $user, $pass, $options);


try {
    $sql = "INSERT INTO filmai (Pavadinimas, Aprasymas, Zanro_id, Premjeros_data)
             VALUES (:Pavadinimas, :Aprasymas, :Zanro_id, :Premjeros_data)";

    $query = $pdo->prepare($sql);
    $query->execute([
        ':Pavadinimas' => $_POST['Pavadinimas'],
        ':Aprasymas' => $_POST['Aprasymas'],
        ':Zanro_id' => $_POST['Zanrai'],
        ':Premjeros_data' => $_POST['Premjeros_data'],
    ]);

    echo "Įrašas pridėtas";
}catch (\PDOException $e){
    echo "Veiksmo atlikti neina";
    exit;
}
$pdo = null;
}
?>

<div class="bs-add-films" data-example-id="basic-forms">
    <form method="POST">
        <div class="form-group"><label for="Pavadinimas">Filmo pavadinimas:</label>
            <input type="text" class="form-control" name="Pavadinimas" id="Pavadinimas">
        </div>
        <div class="form-group"><label for="Aprasymas">Filmo aprašymas:</label>
            <input type="text" class="form-control" name="Aprasymas" id="Aprasymas">
        </div>

        <div class="form-group"> <label for="Zanro_id">Filmo žanras:</label>
            <select class="form-control" name="Zanro_id">
                <option value="zanro-pasirinkimas" selected disabled>Pasirinkite žanrą</option>
            <?php foreach ($genres as $genre): ?>
                <option value="<?=$genre['Id']?>"><?=$genre['Zanrai']?></option>
                <?php endforeach; ?>
            </select>
        </div>
            <div class="form-group"><label for="Premjeros_data">Premjeros data</label>
                <input type="date" class="form-control" name="Premjeros_data" id="Premjeros_data">
            </div>
    <div>
            <button type="submit" name="submit" class="btn btn-primary">Pridėti</button>
        </div>
    </form>
</div>