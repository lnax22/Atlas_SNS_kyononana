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
     <a href="/top"><img src ="{{ asset('images/atlas.png')}}" width="100" height="40"></a>
      <div id="accordion" class="accordion-container">
        <h4 class="accordion-title js-accordion-title">
         <p class="image_circle">{{ Auth::user()->username }}さん
            @if(Auth::user()->images == null)
             <img src ="{{ asset('images/icon1.png')}}" class="icon" width="45" height="45">
             @else
             <img src="{{asset('storage/' .Auth::user()->images)}}" class="icon" width="45" height="45">
            @endif
        </h4>
        <ul class="accordion-content">
          <li><a class=accordion-menu href="/top">HOME</a></li>
          <li><a class=accordion-menu href="/profile">プロフィール編集</a></li>
          <li><a class=accordion-menu href="/logout">ログアウト</a></li>
      <!-- aタグを使用することで、リンク先を指定することができます。liタグ内に記述したaタグの「href属性」に、それぞれのアンカーリンク同一ページ内のリンク先を設定します。なお、同一ページ内のリンクは、「id属性」で指定された場所まで「href=”#○○”」と記述することで移動ができます。 -->
        </ul>
      </div>
    </header>
    <div id="row">
        <div id="container">
            <!-- これは、超簡単に説明すると、「この部分にcontentという名前をつけて、各ページで中身が変わる部分だよ！」っていうことを指しています。 -->
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p>{{ Auth::user()->username }}さんの</p>
                <div>
                <p class="followCount">フォロー数 {{ Auth::user()->follows()->get()->count() }}名</p>
                </div>
                <button class="followListBtn"><a href="/followList">フォローリスト</a></button>
                <div>
                <p class="followerCount">フォロワー数 {{ Auth::user()->followed()->get()->count() }}名</p>
                </div>
                <button class="followerListBtn"><a href="/followerList">フォロワーリスト</a></button>
            </div>
             <button class="userSearchBtn"><a href="/search">ユーザー検索</a></button>
        </div>
    </div>
    <footer>
    </footer>
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/script.js')}}"></script>
</body>
</html>
