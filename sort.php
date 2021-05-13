            <?php
            //sort文書き足し
                $sql = "select * from product";
                if($_GET["sort"] == "ASC" && $_GET["karamu"] == "pri"){
                    $sql = "select * from product where name like :keyword ORDER BY price ASC";
                } else if($_GET["sort"] == "DESC" && $_GET["karamu"] == "pri"){
                    $sql = "select * from product where name like :keyword ORDER BY price DESC";
                }
            ?>
