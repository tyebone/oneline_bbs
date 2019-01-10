<?php
  // ここにDBに登録する処理を記述する
//登録処理 1.DB接続:


//CRUD
//create作成
	//INSERT文
		//INSERT INTO テーブル名(カラム名1,...)
//read読み込み
	//SELECT文
//Updste更新
	//UPDATE文
		//UPDATE テーブル名SET カラム名1 = 値１,
		//カラム名２ = 値2,...WHERE 条件
    //例文)UPDATE `posts` SET `nickname` ='hoge' WHERE `id` = 1
	//WHERE句を忘れるとすべてのレコードが更新されるので注意
	//Delete削除
	//DELETE文
		//(例文)DELETE FROM `posts` WHERE `id` = 1
        // WHERE句を忘れるとすべてのレコードが削除されるので注意

$dsn = 'mysql:dbname=oneline_bbs;host=localhost';
$user = 'root';//誰が
$password ='';//パスワードは何か
$dbh = new PDO($dsn, $user, $password);//接続する処理
//dbh (datebase handle)データベースを扱うことができるやつ


$dbh->query('SET NAMES utf8');
//文字コード設定
 //わからな->





//2. SQL実装:
if (!empty($_POST)) {
	//POST送信かどうか
	$nickname = $_POST['nickname'];
	//formタグに注意
	$comment = $_POST['comment'];
	//POSTは連想配列
	//CRUD処理
		//データ処理のすべて
	//Ceate:INSERT文作成
	//INSERT INTO テーブル名 (カラム名１,カラム２...) VLUES(値１,値２...);

	//Read :SELECT文
	//取得SELECT文カラム名１,カラム名２,...FROM テーブル名;

	//SELECT カラム名１,カラム２

	//Update:UPDATE文更新
	//Delete:DELETE文削除
	$sql = 'INSERT INTO`posts` (`nickname`,`comment`,`created`) VALUES (?, ?, NOW())';
// ?を使う理由
// SQLインジェクション対策
// NOW()はSQLの関数 現在日時の算出
	$date = [$nickname, $comment];
// $date = array($nickname,$comment);
	$stmt = $dbh->prepare($sql);
	$stmt->execute($date);//ここで初めてSQLが実行される
}






//３.一覧表示:

$sql = 'SELECT * FROM `posts`';//SELECT * FROM テーブル名; 
$stmt = $dbh->prepare($sql);
$stmt->execute();
//SQL文に?がないので$data渡す必要なし
$posts = [];// 所得したデータを格納するための配列
while(true){//全レコードを所得する
	$record = $stmt->fetch(PDO::FETCH_ASSOC);
	//1行ずつ処理
	if ($record == false) {
		//レコードが存在しないときはfalseになる
		break;
	}
	$posts[] = $record;
	//配列にレコードを追加
}

//echo '<pre>';
//var_dump($posts);
//echo '</pre>';
?>


<!DOCTYPE html>
	<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>セブ掲示版</title>
</head>
<body>
	<!-- formタグにはmethodとaction必須-->
	<!--method: 送信方法どうアクセスするか
		action: 送信先アクセスする場所
		actionが空白の場合自分自身に戻る
				method	GET aタグの場合 検索
						POST form 登録.更新
					余談
						put
						patch
						delete	-->
    <form method="post" action="">
    	<!--formタグ内のinputタグやtextareaタグのname属性が$_POSTのキーになる-->
      <p><input type="text" name="nickname" placeholder="nickname"></p>
      <p><textarea type="text" name="comment" placeholder="comment"></textarea></p>
      <p><button type="submit" >つぶやく</button></p>
    </form>
    <!-- ここにニックネーム、つぶやいた内容、日付を表示する -->
    <!-- 一覧表示-->
    <!-- 投稿情報をすべて表示する = 1件ずつくり返し表示処理をする$postsは配列なのでforeachが使える
    	for each($配列名as $任意の変数名)
    	for each(複数形 as 単数形)
    -->

	<?php foreach ($posts as $post): ?>
		<p><?php echo $post['nickname'];?></p>
		<!--日付-->
		<p><?php echo $post['created'];?></p>
		<!--コメント-->
		<p><?php echo $post ['comment'];?></p>
		<hr>
	<?php endforeach; ?>
</body>
</html>