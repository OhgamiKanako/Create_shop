<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>商品一覧画面</title>
	<link rel="stylesheet" href="style.css">
</head>

<body>
	<?php require 'menu.php'; ?>
	<hr>
	<table>
		<tr>
		<th scope="col">商品番号<a href="sort_demo.php?sort=ASC&karamu=id">↓</a><a href="sort_demo.php?sort=DESC&karamu=id">↑</a></th></th>
		<th scope="col">商品名<a href="sort_demo.php?sort=ASC&karamu=vegi">↓</a><a href="sort_demo.php?sort=DESC&karamu=vegi">↑</a></th>
		<th scope="col">値段<a href="sort_demo.php?sort=ASC&karamu=pri">↓</a><a href="sort_demo.php?sort=DESC&karamu=pri">↑</a></th>
		</tr>
		<?php
		//MySQLデータベースに接続する
		require 'db_connect.php';
		//sort文書き足し
			$sql = "select * from product";
			if($_GET["sort"] == "ASC" && $_GET["karamu"] == "pri"){
				$sql = "select * from product ORDER BY price ASC";
			} else if($_GET["sort"] == "DESC" && $_GET["karamu"] == "pri"){
                $sql = "select * from product ORDER BY price DESC";
            } else if($_GET["sort"] == "ASC" && $_GET["karamu"] == "vegi"){
                $sql = "select * from product ORDER BY name ASC";
            } else if($_GET["sort"] == "DESC" && $_GET["karamu"] == "vegi"){
                $sql = "select * from product ORDER BY name DESC";
            } else if($_GET["sort"] == "ASC" && $_GET["karamu"] == "id"){
                $sql = "select * from product ORDER BY id ASC";
            } else if($_GET["sort"] == "DESC" && $_GET["karamu"] == "id"){
                $sql = "select * from product ORDER BY id DESC";
            }
            $stm = $pdo->prepare($sql);
			//SQL文を実行する
			$stm->execute();
			//結果の取得（連想配列で受け取る）
			$result = $stm->fetchAll(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
			$id = $row['id'];
		?>
			<tr>
				<td><?= $id ?></td>
				<td><a href="detail.php?id=<?= $id ?>"><?= $row['name'] ?></a>
				</td>
				<td><?= $row['price'] ?></td>
			</tr>
		<?php
		}
		?>
	</table>
</body>
</html>