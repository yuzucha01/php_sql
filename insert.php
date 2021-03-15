
<?php
//入力しているかどうかのチェック
if(
    !isset($_POST["name"]) || $_POST["name"]=="" ||
    !isset($_POST["email"]) || $_POST["email"]=="" ||
    !isset($_POST["password"]) || $_POST["password"]==""
){
    exit('ParamError');
}

//POSTデータの取得
$name  = $_POST["name"];
$email = $_POST["email"];
$password = $_POST["password"];

//OB接続しますmysqlを他のデータベースに変えることも可能
try {
    $pdo = new PDO('mysql:dbname=gs_db;host=localhost;charset=utf8','root','root');
    echo "接続OK！";
  } catch (PDOException $e) {
    echo 'DB接続エラー！: ' . $e->getMessage();
  }

//データ登録SQLの作成(POSTデータ取得で取得したデータをSQLに入れる)
//SELECT(データ抽出)
//SELECT*FROM gs_an_table WHERE name = で特定のデータを抽出することができる
//bindValueはデータベースに向かない文字を自動で除去してくれる
$stmt = $pdo -> prepare("INSERT INTO gs_an_table(id, name, email, password, indate )
VALUES(NULL, :a1, :a2, :a3, sysdate())");

$stmt->bindParam(':a1', $name, POD::PARAM_STR); //数値の場合は PARAM_INT
$stmt->bindParam(':a2', $email, POD::PARAM_STR);
$stmt->bindParam(':a3', $password, POD::PARAM_STR);
$status = $stmt->execute();

if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("QueryError:".$error[2]);

  }else{
    //５．index.phpへリダイレクト
    header("Location: index.php");
    exit;
  }
  ?>






