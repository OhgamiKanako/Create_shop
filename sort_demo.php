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
		<th scope="col">商品番号<a href="sort_demo.php?sort=id">↓</a><a href="sort_demo.php?sort=ia">↑</a></th></th>
		<th scope="col">商品名<a href="sort_demo.php?sort=nd">↓</a><a href="sort_demo.php?sort=na">↑</a></th>
		<th scope="col">値段<a href="sort_demo.php?sort=pd">↓</a><a href="sort_demo.php?sort=pa">↑</a></th>
		</tr>
		<?php
		//MySQLデータベースに接続する
		require 'db_connect.php';
		//sort文書き足し
			$sql = "select * from product";
			switch($_GET["sort"]){
				case "id":
					$sql = "select * from product ORDER BY id DESC";
					break;
				case "ia":
					$sql = "select * from product ORDER BY id ASC";
					break;
				case "nd":
					$sql = "select * from product ORDER BY name DESC";
					break;
				case "na":
					$sql = "select * from product ORDER BY name ASC";
					break;
				case "pd":
					$sql = "select * from product ORDER BY price DESC";
					break;
				case "pa":
					$sql = "select * from product ORDER BY price ASC";
					break;
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