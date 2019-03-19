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

try {
<<<<<<< HEAD
    $db = $pdo->prepare("SELECT filmai.ID, pavadinimas, aprasymas, zanro_id, premjeros_data, zanrai.zanras FROM filmai
INNER JOIN zanrai ON filmai.zanro_id = zanrai.Id WHERE filmai.ID = :ID;");
    $db->execute([
            ':ID' => $_GET['ID']
=======
    $db = $pdo->prepare("SELECT filmai.ID, pavadinimas, aprasymas, zanro_id, premjeros_data, zanrai.Zanrai FROM filmai
INNER JOIN zanrai ON filmai.zanro_id = zanrai.Id WHERE filmai.ID = :ID;");
    $db->execute([
        ':ID' => $_GET['ID']
>>>>>>> db1f7d9a9b425701f994b58de717ba8ecb93a750
    ]);
} catch (\PDOException $e){
    echo "Duomenų pakeisti nepavyko";
    exit;
}
$db->execute();
$data = $db->fetchAll();
$pdo = null;



if (isset($_POST['submit'])) {
    $pdo = new PDO($dsn, $user, $pass, $options);
    try {
        $sql = "UPDATE filmai 
<<<<<<< HEAD
        SET Pavadinimas = :Pavadinimas, Aprasymas = :Aprasymas, Zanro_id=:Zanro_id, Premjeros_data = :Premjeros_data
=======
        SET Pavadinimas = :Pavadinimas, Aprasymas = :Aprasymas, Zanro_id = :Zanro_id, Premjeros_data = :Premjeros_data
>>>>>>> db1f7d9a9b425701f994b58de717ba8ecb93a750
        WHERE filmai.ID = :ID";

        $query = $pdo->prepare($sql);
        $query->execute([
            ':Pavadinimas' => $_POST['Pavadinimas'],
            ':Aprasymas' => $_POST['Aprasymas'],
<<<<<<< HEAD
            ':Zanro_id' => $_POST['Zanras'],
=======
            ':Zanro_id' => $_POST['Zanrai'],
>>>>>>> db1f7d9a9b425701f994b58de717ba8ecb93a750
            ':Premjeros_data' => $_POST['Premjeros_data'],
            ':ID' => $_GET['ID']
        ]);

        echo "Įrašas atnaujintas";
    }catch (\PDOException $e){
        echo "Veiksmo atlikti neina";
        exit;
    }
    $pdo = null;
}
?>
<?php foreach ($data as $filmas):?>
<<<<<<< HEAD
<div class="bs-add-films" data-example-id="basic-forms">
    <form method="POST">
        <div class="form-group"><label for="Pavadinimas">Filmo naujas pavadinimas:</label>
            <input type="text" class="form-control" value="<?=$filmas['pavadinimas']?>" name="Pavadinimas" id="Pavadinimas">
        </div>
        <div class="form-group"><label for="Aprasymas">Filmo naujas aprašymas:</label>
            <input type="text" class="form-control" value="<?=$filmas['aprasymas']?>" name="Aprasymas" id="Aprasymas">
        </div>

        <div class="form-group"> <label for="Zanro_id">Filmo naujas žanras:</label>
            <select class="form-control" name="Zanras">
                <option value="zanro-pasirinkimas" selected disabled>Pasirinkite žanrą</option>
                <?php foreach ($genres as $genre): ?>
                    <option value="<?=$genre['Id']?>"><?=$genre['Zanras']?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group"><label for="Premjeros_data">Premjeros nauja data</label>
            <input type="date" class="form-control" value="<?=$filmas['premjeros_data']?>" name="Premjeros_data" id="Premjeros_data">
        </div>
        <div>
            <button type="submit" name="submit" class="btn btn-primary">Išsaugoti pakeitimus</button>
        </div>
    </form>
</div>
 <?php endforeach; ?>
=======
    <div class="bs-add-films" data-example-id="basic-forms">
        <form method="POST">
            <div class="form-group"><label for="Pavadinimas">Filmo naujas pavadinimas:</label>
                <input type="text" class="form-control" value="<?=$filmas['pavadinimas']?>" name="Pavadinimas" id="Pavadinimas">
            </div>
            <div class="form-group"><label for="Aprasymas">Filmo naujas aprašymas:</label>
                <input type="text" class="form-control" value="<?=$filmas['aprasymas']?>" name="Aprasymas" id="Aprasymas">
            </div>

            <div class="form-group"> <label for="Zanro_id">Filmo naujas žanras:</label>
                <select class="form-control" name="Zanras">
                    <option value="zanro-pasirinkimas" selected disabled>Pasirinkite žanrą</option>
                    <?php foreach ($genres as $genre): ?>
                        <option value="<?=$genre['Id']?>"><?=$genre['Zanrai']?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group"><label for="Premjeros_data">Premjeros nauja data</label>
                <input type="date" class="form-control" value="<?=$filmas['premjeros_data']?>" name="Premjeros_data" id="Premjeros_data">
            </div>
            <div>
                <button type="submit" name="submit" class="btn btn-primary">Išsaugoti pakeitimus</button>
            </div>
        </form>
    </div>
<?php endforeach; ?>
>>>>>>> db1f7d9a9b425701f994b58de717ba8ecb93a750
