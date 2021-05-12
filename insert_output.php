<?php session_start(); ?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="UTF-8">
	<title>商品登録画面</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>

	<?php require 'menu.php'; ?>
	<?php
	  require 'db_connect.php';
	  //SQL文の作成
	  $sql = "INSERT INTO product VALUES(null,:name,:price)";
	  //プリペアードステートメントを作成
	  $stm = $pdo->prepare($sql);
	  $stm->bindValue(':name',$_POST['name'],PDO::PARAM_STR);
	  $stm->bindValue(':price',$_POST['price'],PDO::PARAM_INT);
	  //SQL文を実行
	  $stm->execute();
	  echo "商品を追加いたしました。";
	?>
</body>
</html>