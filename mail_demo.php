<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>メール</title>
</head>
<body>
<h1>お問い合わせ/メール</h1>
<form action="mail_input.php" method="post">
    <div>
      <label>お名前</label>
      <input type="text" value="" name="name">
    </div>
    <div>
      <label>メールアドレス</label>
      <input type="text" value="" name="email">
    </div>
    <div>
      <label>ご意見</label>
      <textarea rows="5" cols="30" name="opinion">
      </textarea>
    </div>
    <input type="submit" value="送信" name="btn_conform">
</form>
</body>
</html>