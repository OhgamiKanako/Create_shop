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
	<form action="insert_output.php" method="post">
	<table>
	<tr>
	 <th><label for="name">商品名：</label></th>
	 <td><input type="text" name="name"></td>
	</tr>
	<tr>
	 <th><label for="price">お値段：</label></th>
	 <td><input type="text" name="price"></td>
	</tr>
    <tr><th></th><td><input type="submit" value="登録"></td></tr>
	</table>
    </form>
	</body>
</html>