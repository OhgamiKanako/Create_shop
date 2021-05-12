<?php
require 'db_connect.php';
$sql = "SELECT * FROM product";
$stm = $pdo->prepare($sql);
switch($_GET["s"]){
    case "price_a":
        $sql .= "ORDER BY price ASC";
        break;
    case "price_d":
        $sql .= "ORDER BY price DESC";
        break;
}
$stm->execute();
?>