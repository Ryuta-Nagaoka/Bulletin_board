
<h1>作品名</h1>
<h3>ひとこと掲示板</h3>
<br>

<h1>実装機能</h1>
<h3>データベースを用いて会員登録機能、CRUD機能をつけた簡易掲示版です。</h3>
<br>

<h1>使用した技術</h1>
<h2>HTML、CSS、PHP、MySQL</h2>
<br>

<h1>会員登録</h1>
<h3>ブランクが一つでもあるとその箇所にエラーメッセージが表示されます。メールアドレスも重複がないようにSQLのSELECTで判定しています。エラーがひとつもなければ確認画面に飛びます。</h3>
<img width="800" alt="掲示版1" src="https://user-images.githubusercontent.com/97508941/159472035-e68df3bf-f011-4be4-bf88-1d8d3a76869c.png"><img width="1001" alt="スクリーンショット 2022-03-25 17 37 48" src="https://user-images.githubusercontent.com/97508941/160149091-aa325fdf-fb78-448e-a2a1-4e11e90f0cca.png">
<br>

<h1>入力内容の確認</h1>
<img width="800" alt="掲示版2" src="https://user-images.githubusercontent.com/97508941/159472212-9b6a2ce2-1caa-4ba2-a150-dcf636eb7249.png"><br>
<br>

<h1>ログイン</h1>
<img width="800" alt="掲示版3" src="https://user-images.githubusercontent.com/97508941/159472237-a07eb22a-1333-4920-a6dc-94af7d1cc790.png"><br>
<br>

<h1>投稿</h1>
<img width="800" alt="スクリーンショット 2022-03-22 20 39 18" src="https://user-images.githubusercontent.com/97508941/159473949-67b5fd78-ad2a-45ad-99bc-e14022472c4f.png">
<br>

<h1>検索機能を追加しました</h1>
<h3>検索すると検索した内容の含まれる投稿と検索ワードとヒットした件数が表示されます。</h3>
<img width="800" alt="スクリーンショット 2022-03-25 17 37 17" src="https://user-images.githubusercontent.com/97508941/160088867-8b6f1f78-6703-4e7d-a114-0f1e2e7ce77c.png">

<img width="800" alt="スクリーンショット 2022-03-25 17 37 48" src="https://user-images.githubusercontent.com/97508941/160088973-c23345f9-1995-4b85-9f49-e364cca43177.png">

<img width="800" alt="スクリーンショット 2022-03-25 17 39 10" src="https://user-images.githubusercontent.com/97508941/160089019-96ed1d25-23a3-4fdf-8c66-ae1beb4993f0.png">
<br>

<h1>工夫したポイント</h1>
<h3>
  検索した内容だけでなく件数も表示したかったので検索のSQLと件数カウントのSQLを分けて先に（index.phpで)件数のカウントを行いその結果をセッションで(seach.phpに)表示するよう   にしました。
</h3>

index.php
<img width="800" alt="count" src="https://user-images.githubusercontent.com/97508941/160088905-ca630706-ef61-4b22-a586-b76bc9ea273d.png">

search.php
<img width="800" alt="search" src="https://user-images.githubusercontent.com/97508941/160088849-ab5dec4d-c1d3-4a19-b1f5-1855c68c8e1c.png">







