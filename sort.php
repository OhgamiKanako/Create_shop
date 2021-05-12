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

<!-- https://qiita.com/muzudho1/items/946e7b6d958838256703#%E4%BB%8A%E5%9B%9E%E3%82%84%E3%82%8A%E3%81%9F%E3%81%84%E3%81%93%E3%81%A8 -->
<!-- https://www.softel.co.jp/blogs/tech/archives/4421 -->
<!-- http://www.nkdesk.com/2012/02/24/%E3%83%86%E3%83%BC%E3%83%96%E3%83%AB%E3%81%A7%E3%82%BD%E3%83%BC%E3%83%88%EF%BC%88%E4%B8%A6%E3%81%B3%E6%9B%BF%E3%81%88%EF%BC%89%E3%82%92%E6%9C%89%E5%8A%B9%E3%81%AB%E3%81%99%E3%82%8B/ -->