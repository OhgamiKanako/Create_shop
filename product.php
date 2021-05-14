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
	<form action="product.php" method="post">
		商品検索
		<input type="text" name="keyword">
		<input type="submit" value="検索">
	</form>
	<hr>
	<table>
	<tr>
		<th scope="col">商品番号<a href="product.php?sort=id">↓</a><a href="product.php?sort=ia">↑</a></th></th>
		<th scope="col">商品名<a href="product.php?sort=nd">↓</a><a href="product.php?sort=na">↑</a></th>
		<th scope="col">値段<a href="product.php?sort=pd">↓</a><a href="product.php?sort=pa">↑</a></th>
		</tr>
		<?php
		//MySQLデータベースに接続する
		require 'db_connect.php';
		//検索の判断
		if (isset($_POST['keyword'])) {
			//SQL文を作る（プレースホルダを使った式）
			$sql = "select * from product where name like :keyword";
			//プリペアードステートメントを作る
			$stm = $pdo->prepare($sql);
			//プリペアードステートメントに値をバインドする
			$stm->bindValue(':keyword', '%' . $_POST['keyword'] . '%', PDO::PARAM_STR);
		} else {
			//SQL文を作る
			$sql = "select * from product";
			//プリペアードステートメントを作る
			$stm = $pdo->prepare($sql);
		}
		require 'sort.php';
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