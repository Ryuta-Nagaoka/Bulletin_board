
<h1>作品名</h1>
<h3>ひとこと掲示板</h3>
<br>

<h1>作品説明</h1>
<h3>
  データベースを用いた簡易掲示版です。
  （検索機能を後から追加しました。）
</h3>
<br>

<h1>使用した技術</h1>
<h3>HTML、CSS、PHP、MySQL</h3>
<br>

<h1>会員登録</h1>
<h3>ブランクが一つでもあるとその箇所にエラーメッセージが表示されます。メールアドレスも重複がないようにSQLのSELECTで判定しています。エラーがひとつもなければ確認画面に飛びます。</h3>
<img width="800" alt="掲示版1" src="https://user-images.githubusercontent.com/97508941/159472035-e68df3bf-f011-4be4-bf88-1d8d3a76869c.png">
<img width="800" alt="スクリーンショット 2022-03-26 0 16 24" src="https://user-images.githubusercontent.com/97508941/160151797-569d2d93-9a64-4c86-82c9-24b9286b6bee.png">

<br>

<h1>入力内容の確認</h1>
<h3>確認画面には入力した内容をが表示されます。そして確認するボタンを押すとデータベースに会員情報が保存され、完了画面が表示されます。</h3>
<img width="800" alt="スクリーンショット 2022-04-01 18 01 00" src="https://user-images.githubusercontent.com/97508941/161231599-87c50e54-0e82-44af-a0f3-22de3b6e5e29.png">
<img width="800" alt="スクリーンショット 2022-04-01 17 37 03" src="https://user-images.githubusercontent.com/97508941/161227362-be22d82e-a845-4246-a42c-bd6bc037eed6.png">
<br>

<h1>ログイン</h1>
<h3>入力したメールアドレスとパスワードが一致するとログインでき投稿画面が表示されます。</h3>
<img width="800" alt="掲示版3" src="https://user-images.githubusercontent.com/97508941/159472237-a07eb22a-1333-4920-a6dc-94af7d1cc790.png"><br>
<br>

<h1>投稿</h1>
<h3>テキストエリアにコメントを入力し投稿すると投稿エリアに投稿された内容がその都度表示されていきます。</h3>
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
  検索した内容だけでなく件数も表示したかったので検索のSQLと件数カウントのSQLを分けて先に（index.phpで)件数のカウントを行いその結果をセッションで送り(seach.phpに)表示するようにしました。
</h3>

index.php
<img width="800" alt="count" src="https://user-images.githubusercontent.com/97508941/160088905-ca630706-ef61-4b22-a586-b76bc9ea273d.png">

search.php
<img width="800" alt="search" src="https://user-images.githubusercontent.com/97508941/160088849-ab5dec4d-c1d3-4a19-b1f5-1855c68c8e1c.png">







