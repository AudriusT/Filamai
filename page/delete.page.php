<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];
// SQL query to Display Details.
    $stmt = $pdo->query("select * from filmai");
    while ($row1 = mysql_fetch_array($query1)) {
        ?>