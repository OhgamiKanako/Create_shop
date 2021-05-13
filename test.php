<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<form action="" method="POST">
    <?php echo "ソートさせたい文字列を入れてください(1024文字まで)"; ?>
    <br>
    <!-- 入力フォームとボタンを作成 -->
    <input type="text" name="content">
    <input type="submit" name="昇順" value="昇順ソート">
    <input type="submit" name="降順" value="降順ソート">
</form>
</body>
</html>

<?php
    // 入力文字を受け取る
    $content = htmlspecialchars($_POST["content"], ENT_QUOTES, "UTF-8");
    $contentCnt = 0;

    // 入力文字を受け取った場合
    if(isset($content)){
        // 文字数を数える
        $contentCnt = mb_strlen($content);
        // 文字数が有効範囲の場合
        if(1 <= $contentCnt && $contentCnt <= 1024){
            // 文字数分カンマで区切る
            for($i = 0; $i <= $contentCnt; $i++){
                $contentStr .= mb_substr($content,$i,1).',';
            };
            // カンマの位置で配列に分割
            $contentStr = explode(',',$contentStr);
            // 昇順/降順ソートボタンを押した時
            if("昇順ソート" === $_POST['昇順']){
                // 昇順ソートする
                sort($contentStr, SORT_STRING);
                $check = "asc";
            }elseif("降順ソート" === $_POST['降順']){
                // 降順ソートする
                rsort($contentStr, SORT_STRING);
                $check = "desc";
            };
            // 配列の要素値をresultに全て格納
            foreach($contentStr as $contentSort){
                $result .= $contentSort;
            };
             // 昇順/降順ソートボタンを押した時
            switch($check){
                case "asc" :
                    print $result."　<b>左記文字を昇順ソートしました</b>";
                    break;

                case "desc" :
                    print $result."　<b>左記文字を降順ソートしました</b>";
                    break;
            };
        }elseif($contentCnt > 1024){
            echo "1024文字以内で入力してください。";
        }elseif($contentCnt == 0){
            echo "文字を入力してください";
        }
    }
?>
