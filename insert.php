
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
try{
    $pdo=new PDO('mysql:dbname=gs_db;charset=utf8;host=localhost','root','');
}catch(PDOException $e){
    exit('DbConnectError:'.$e->getMessage());
}

//データ登録SQLの作成(POSTデータ取得で取得したデータをSQLに入れる)
$sql = "INSERT INTO gs_an_table(id, name, email, password,
indate ) VALUES(NULL, :a1, :a2, :a3, sysdate())";

//SELECT(データ抽出)
//SELECT*FROM gs_an_table WHERE name = で特定のデータを抽出することができる
//SELECT name,email,inDate FROM gs_an/table WHERE id>=3

//bindValueはデータベースに向かない文字を自動で除去してくれる
$stmt = $pdo->prepare($sql);

$stmt->bindVaLue(':a1', $name, POD::PARAM_STR); //数値の場合は PARAM_INT
$stmt->bindVaLue(':a2', $email, POD::PARAM_STR);
$stmt->bindVaLue(':a3', $password, POD::PARAM_STR);
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







<!-- // include("index.html");

// if(array_key_exists('email', $_POST) OR array_key_exists('password',$_POST)){
//     if($_POST['email'] == '' && $_POST['password']== ''){
//         echo "メールアドレスを入力してください"."<br>";
//         echo "パスワードを入力してください";
//     }else {
//         echo "登録完了";
//     }
// }



// $s = date("s");
// if($s < 20){
// echo '<p style="color:white;background-color:red">1から19以上</p>';
// }elseif($s < 40){
// echo '<p style="color:black;background-color:white">20から39以上</p>';
// }else{echo '<p style="color:white;background-color:blue">40から59以上</p>';
// }

// echo "現在:".$s."秒"; -->
