かねてより作りたかったプログラミングコードのタイピングサービスを作成しました。
コードレビュー頂くとともに少しでもお楽しみ頂ければ幸いです。

プログラムを始めたころタイピングの練習を始めました。
プログラミング学習の動画を見てるとたまにタイピングが鬼速い人がいます。特に外人が早い気がします。
プログラミングにタイピングの速さは必要な異説もありますが、速いとやっぱりかっこいいです。

タイピングサイトで練習してまあまあ速くなりました。e-typingでAを取れるぐらいいです。
しかしコードを書いていると、あれ、めっちゃ遅い。まあまあ速くなったはずなのに。
それもそのはずで僕が練習していたのは日本語の入力でプログラミングはアルファベット。
日本語入力の練習でシフトキーなどは使いませんでした。なるほと思い再度英語入力でタイピングの練習を始めました。
英語入力もまあまあ速くなりました。しかしプログラムを書く時のもたつきは治りません。
なぜだ。。そうでした。文章タイピングには『｛』も『<』も『+』も『=』も『"』もほとんど使いません。
指の使い方がまったく違うのだと思い直しプログラミングコードのタイピングサイトを作ることにしました。
（プログラムとはいってもまだhtml・CSSがメインですが）
コードの生成物が表示されるようにしたので初心者の方の学習としても使えるかなと思っております。





以下操作について説明させていただきます。


１．ルートにアクセスするとタイピング画面に遷移します。
２．スペースキーでスタートします。
３．左側に問題文が表示されるのでタイピングしていきます。
４．一つの問題文の入力が終わると右側に表示されているコードの生成物が強調されます。（この間タイマーはストップします）
５．タイマーが０になると終了して右側に結果が表示されます。
６．結果表示画面の『アカウントを登録してランキングに挑戦』ボタンで登録画面に遷移します。
７．アカウントを登録するとランキングに挑戦できるようになります。
８．もう一度タイピングに挑戦して『ランキングに登録』ボタンを押すとランキングに登録できます。
９．『ランキングを見る』ボタンでランキング一覧を確認できます（順位軸は得点です）。
１０．~./view/admin.phpで管理画面にアクセスできて、問題文の登録ができます。（改行はせずに詰めて書きます）



以上になります。


*すみません、一点だけ不手際がありましてテスト用にタイマーを一秒に設定して
そのままにしまっているのですが、84行目の『let lestTime=1』の数値を120などにして
試していただければと思います。お手数おかけしますがよろしくお願いします


* 7/31 1:31
readmeとsqlファイルと画像を一枚入れ忘れていたので追加させていただきました


