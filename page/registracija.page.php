<?php
if (isset($_POST['submit'])) {
    require "inc/config.php";
    require "inc/common.pgp";
    try{
        $connection = new PDO($dsn, $username, $password, $options);

        $stmt = "INSERT INTO mokiniai (vardas, pavarde, elpastas, telefonas, miestas, registracijos_data)
VALUES (:name, :lastname, :email, :phone, :location, :reg_date)";
        $querie = $connection->prepare($stmt);
        $querie->execute(array(
            ':name' => $_POST['name'],
            ':lastname' => $_POST['lastname'],
            ':email' => $_POST['email'],
            ':phone' => $_POST['phone'],
            ':location' => $_POST['location'],
            ':reg_date' => date('y-m-d h:m:s'),

        ));
    }catch (Exception $e) {
        echo "Negaliu pridėti naujo įrašo";
        echo $e->getMessage();
        exit;
    }
}

?>

<?php require "templates/index.view.php"; ?>

<?php
if (isset($_POST['submit'])) {
?>
<blockquote><?php echo $_POST['name']; ?> pridėtas sėkmingai.</blockquote>
}


<form>
    <label for="name">Vardas</label>
    <input type="text" name="name" id="name">
    <label for="lastname">Pavardė</label>
    <input type="text" name="lastname" id="lastname">
    <label for="email">El. paštas</label>
    <input type="text" name="email" id="email">
    <label for="phone">Telefono nr.</label>
    <input type="text" name="phone" id="phone">
    <label for="location">Miestas</label>
    <input type="text" name="location" id="location">
    <input type="submit" name="submit" value="submit">
    <select name="genre">
        <option value=""></option>
    </select>
    <a href="?page=home">Atgal</a>
</form>