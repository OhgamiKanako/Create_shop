            <?php
    		require 'db_connect.php';
			$sql = "select * from product";
            //sort文書き足し 
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
            ?>
