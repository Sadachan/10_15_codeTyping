<?php
  include('dbConection.php');
  session_start();

  $pdo=dbconnect();

  //問題文をランダムに取得
  $sql="SELECT * FROM examsentences ORDER BY RAND()";
  $stmt=$pdo->prepare($sql);
  $status=$stmt->execute();
  $title = array();
  $sentence = array();
  if($status==false){
    //失敗の処理
    $error=$stmt->errorInfo();
    exit('sqlError'.$error[2]);
  }else{
    //成功後の処理
    $results=$stmt->fetchAll();
    forEach($results as $result){  
      array_push($title,$result['title']);
      array_push($sentence,$result['sentence']);
    }
    $titleJson=json_encode($title);
    $sentenceJson=json_encode($sentence);
  }
  $login_status='';
  $user_id='';
  if(isset($_SESSION['user'])){
    $login_status='yes';
    $user_id=$_SESSION['user']['user_id'];
  }
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
   <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <title></title>
</head>

<html>
  <body>
    <div class="wrapper">
      <div>
      
      <div class="app-title"><span>Code</span> Typing</div>
      <div class="input-box">
        <div class="timer"></div>
        <div class="sentence-title"></div>
        <div class="input"><span class="collected-word"></span></div>
        <div class="msg left">スペースキー</div>
      </div>
      <div class="output"><div class="content"><div class="msg right">を押して開始</div></div></div>
    </div>
  </body>

  <script>
    let endFlag=''
    let lockFlag=1
    $('.timer').hide()

    setInterval(function(){
      $('.msg').fadeIn(500)
      $('.msg').fadeOut(500)
    },500)

    //スペースキーで開始
    $(document).keyup(function(e){
      if(!(endFlag=='on')){
        if(!(lockFlag==0)){
          if(e.keyCode==32){
          gameStart() 
        }
        }
      }
    })

    //タイマーをセットして開始
    let lestTime=1
    
    //ゲームスタート処理
    function gameStart(){
      //カウント開始
       startTimer()
      //タイマー表示
      $('.timer').show()
      $('.timer').html(lestTime)
      //問題のタイトルを表示
      $(".sentence-title").html(examTitle[j])
      //問題文を表示
      $(".input").append("<span class='waiting-word'>"+examSentenceToShow+"</span>")
      //$(".output").html(examSentenceToShow=examSentence[3])
      $('.msg').remove()
      //endFlag='off'
    }
    
    //カウントダウン開始処理
    function startTimer(){
      timer=setInterval(function(){
        if(lestTime==0){
          endFlag='on'
          showResult()
        }else{
          lestTime-=1
          $('.timer').html(lestTime)
          console.log(lestTime)
        }
      },1000)
    }
    //カウントダウン停止処理
    function stopTimer(){
      clearInterval(timer);
    }

    //結果表示処理
    function showResult(){
      $('.timer').html("終了")
      stopTimer()
      if(inputCount==0){
        percentageForCollect=0
        score=0
      }else{
        percentageForCollect=(inputCount-wrongCount)/inputCount*100
        percentageForCollect=Math.floor(percentageForCollect*100)/100
        score=inputCount*(percentageForCollect/100)*3
        score=Math.floor(score)
      }
      let result=''
      result+='<table class="result">'
      result+='<tr><th>結果</th><td></td></tr>'
      result+='<tr><th>タイプ数　　：</th><td>'+inputCount+'</td></tr>'
      result+='<tr><th>ミスタイプ数：</th><td>'+wrongCount+'</td></tr>'
      result+='<tr><th>正答率　　　：</th><td>'+percentageForCollect+'%</td></tr>'
      result+='<tr><th>スコア　　　：</th><td>'+score+'</td></tr>'
      result+='<tr><td><form action="view/ranking_list.php" method="POST"><input type="submit" value="ランキングを見る"></form></td>'
      result+='<td><form action="controller/ranking_create.php" method="POST"><input type="hidden" name="user_id" value=<?php echo $user_id; ?>><input type="hidden" name="inputCount" value='+inputCount+'><input type="hidden" name="wrongCount" value='+wrongCount+'><input type="hidden" name="percentageForCollect" value='+percentageForCollect+'><input type="hidden" name="score" value='+score+'><input type="submit" value="ランキング登録" class="register-ranking"></form></td></tr>'
      if (!(login_status=='yes')){
        result+='<tr><td colspan="2"><a href="view/login.php">ログインしてランキングに挑戦</a></td></tr>'
        result+='<tr><td colspan="2"><a href="view/register.php">アカウント登録してランキングに挑戦</a></td></tr>'
      }
      result+='</table>'

      $(".output").html(result)
      restartButton='<a href="index.php"><button class="restart">再挑戦</button></a>'
      $('.wrapper').append(restartButton)
      $('.restart').hide()
      $('.restart').fadeIn(5000)
    }
    
    let i=0
    let j=0
    let inputCount=0;
    let wrongCount=0;
    //問題文のタイトルとセンテンスを取得
    let examTitle = <?php echo $titleJson; ?>;
    let examSentence = <?php echo $sentenceJson; ?>;
    let examSentenceToCheck = <?php echo $sentenceJson; ?>;

    //ログインステータスを取得
    let login_status='<?php echo $login_status; ?>'



    console.log(examSentence[0])
    // let examSentence=["<input>","<input><style>input{color:red;}</style>",'<div class="triangle"></div><style>.triangle{width:0px; border-top:50px solid red; border-right:50px solid transparent; border-bottom:50px solid transparent; border-left:50px solid transparent;}</style>','<ul><li>List1</li><li>List2</li><li>List3</li><li>List4</li></ul>']
    //let examSentenceToCheck=["<input>","<input><style>input{color:red;}</style>",'<div class="triangle"></div><style>.triangle{width:0px; border-top:50px solid red; border-right:50px solid transparent; border-bottom:50px solid transparent; border-left:50px solid transparent;}</style>','<ul><li>List1</li><li>List2</li><li>List3</li><li>List4</li></ul>']
    let examSentenceToShow=examSentence[j].replace(/</g,"&lt").replace(/>/g,"&gt")
    let corectedWords=""

    $(document).keyup(function(e){
      if(endFlag=="on"){
        return false
      }
      //開始のエンターキーをエスケープ
      if(lockFlag==1){
        if(e.keyCode==32){
          lockFlag=0
          return false
        }
      }
      //全角を注意
      if(e.keyCode==229){
        alert('全角になっています')
      }
      
      if(e.keyCode==16){
        
      }
      //入力が正しければ
      else if(e.key==examSentenceToCheck[j][i]){

        //入力音を鳴らす
        let sound=new Audio('./soundEffect/correct.mp3')
        sound.play()

        inputCount+=1
        corectedWords += e.key
        examSentenceToShow=corectedWords.replace(/</g,"&lt").replace(/>/g,"&gt")

        //色を付ける
        $('.collected-word').html(examSentenceToShow)
        examSentenceToCheck[j]=examSentenceToCheck[j].replace(examSentenceToCheck[j][i],"")
        examSentenceToShow=examSentenceToCheck[j].replace(/</g,"&lt").replace(/>/g,"&gt")
        $('.waiting-word').html(examSentenceToShow)

        //右側の枠に出力する
        $(".content").html(corectedWords)
        console.log(e.key)

        //問題文の入力が完了したら
        console.log("入力した文字"+corectedWords)
        console.log("問題文"+examSentence[j])
        if(corectedWords==examSentence[j]){
          //タイマーを停止
          stopTimer()
          //入力完了のアニメーションが終わったら再度カウント開始
          setTimeout(function(){startTimer()},2000)

          //次の問題への準備
          setTimeout(function(){
            //出力を強調する
            $('.content').css('transition','1s')
            $('.content').css('transform','scale(1.5,1.5)')
            $('.content').fadeOut(2000)
      
            setTimeout(function(){
              //出力ボックスを空にする
              $(".content").html("")
              $(".content").show()
            },3000)
          },700)
          //次の問題に移行
          setTimeout(function(){
            j++
            examSentenceToShow=examSentence[j].replace(/</g,"&lt").replace(/>/g,"&gt")
            $(".collected-word").html("")
            $(".waiting-word").html(examSentenceToShow)
            corectedWords=''
            $('.content').css('transform','scale(1,1)')
            $(".sentence-title").html(examTitle[j])
          },2700)
        }
      }else{
        //間違い音を鳴らす
        let sound=new Audio('./soundEffect/wrong2.mp3')
        sound.play()

        wrongCount+=1
        //alert("まちがい！")
      }
    })

    //ランキング登録ボタンクリック時ログインしてなければアラートを出す
    $(document).on('click','.register-ranking',function(){
      if(!(login_status=='yes')){
        alert('この機能はログインが必要です')
        return false
      }
    })
  </script>
</html>