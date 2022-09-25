<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title></title>
    <!-- public/css/app.cssを読み込む -->
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">
    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>
<body>
    <header>
    <!-- <img src="表示する画像のパス(場所)" alt="表示画像の説明文言"> -->
    <li><a href="/top"><img src="images/atlas.png"></a></li>
      <p>さん</p>
      <div id="accordion" class="accordion-container">
        <h4 class="accordion-title js-accordion-title"><img src="images/icon1.png"></h4>
        <div class="accordion-content">
          <p><a href="/top">Home</a></p>
          <p><a href="/profile">プロフィール</a></p>
          <p><a href="/logout">ログアウト</a></p>
      <!-- aタグを使用することで、リンク先を指定することができます。liタグ内に記述したaタグの「href属性」に、それぞれのアンカーリンク同一ページ内のリンク先を設定します。なお、同一ページ内のリンクは、「id属性」で指定された場所まで「href=”#○○”」と記述することで移動ができます。 -->
        </div>
      </div>
    </header>
    <div id="row">
        <div id="container">
            <!-- これは、超簡単に説明すると、「この部分にcontentという名前をつけて、各ページで中身が変わる部分だよ！」っていうことを指しています。 -->
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>さんの</p>
                <div>
                <p>フォロー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/followList">フォローリスト</a></p>
                <div>
                <p>フォロワー数</p>
                <p>〇〇名</p>
                </div>
                <p class="btn"><a href="/followerList">フォロワーリスト</a></p>
            </div>
            <p class="btn">
             <button type=""><a href="/search">ユーザー検索</button>
            </p>
        </div>
    </div>
    <footer>
    </footer>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script src=“https://code.jquery.com/jquery-3.6.1.min.js”></script>
    <script src="{{ asset('js/SNS.js') }}"></script>
</body>
</html>
