<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css" />
  </head>
  <body>
    <form method="post" 　action="insert.php">
      <p>名前を入力してください</p>
      <input name="name" type="text" placeholder="名前を入力してください" />
      <p>メールアドレスを入力してください</p>
      <input name="email" type="text" placeholder="メールを入力" />
      <p>パスワードを入力してください</p>
      <input name="password" type="text" placeholder="パスワードを入力" />
      <input type="submit" value="登録する" />
    </form>
  </body>
</html>
