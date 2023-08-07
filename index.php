
<?php
        if (isset($_POST["submit"])){
            $file_path = "example.c";
            $code = $_POST["code"];
            $fp = fopen($file_path, 'w');
            if ($fp !== false) {
                fwrite($fp, $code);
                fclose($fp);
            } else {
                echo "<div class='test'>ファイルをオープンできませんでした。</div>";
            }
            shell_exec('gcc -S example.c -o example.s');
            shell_exec('gcc example.s -o example.out');
            $filename = 'example.out';
            //バイナリファイルを２進数に変換
            $machineLanguage = '';
    $handle = fopen($filename, 'rb');
    if ($handle) {
        while (!feof($handle)) {
            $byte = fread($handle, 1);
            if(strlen($byte) > 0) {
            $binary = base_convert(ord($byte), 10, 2);
            $binary = str_pad($binary, 8, '0', STR_PAD_LEFT);
            $machineLanguage .= "$binary ";
            }         
        }
            fclose($handle);     }
        }
        unlink('example.c');
        unlink('example.s');
        unlink('example.out');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>machineConverter | yuma4869</title>
    <meta name="description" content="機会にしかわからない二進数の機械語をC言語のコードから作るサービスです。" >
    <meta name="keywords" content="機械語,マシン語,二進数,C言語,低レイヤ" >
    <link rel="icon" href="4869_favicon.png">
    <script src="/predictions.js"></script>
</head>
<style> @import url("https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"); .wrapper { max-width: 1140px; padding-left: 1rem; padding-right: 1rem; margin-left: auto; margin-right: auto; } *, *:before, *:after { box-sizing: border-box; } a { text-decoration: none; color: #222; } .deco-a { color:rgb(255,233,233); text-decoration: underline; } html { -webkit-font-smoothing: antialiased; -moz-osx-font-smoothing: grayscale; } body { font-family: "Roboto", sans-serif; } a { text-decoration:none; color:#222; } .sr-only { position: absolute; clip: rect(1px, 1px, 1px, 1px); padding: 0; border: 0; height: 1px; width: 1px; overflow: hidden; } .button { -webkit-appearance: none; -moz-appearance: none; appearance: none; color: #fff; background-color: #2fa0f6; min-width: 120px; padding: 0.5rem 1rem; border-radius: 5px; text-align: center; } .button svg { display: inline-block; vertical-align: middle; width: 24px; height: 24px; fill: #fff; } .button span { display: none; } @media (min-width: 600px) { .button span { display: initial; } } .button--icon { min-width: initial; padding: 0.5rem; } /* ** The Header Media Queries ** ** Tweak as per your needs ** */ .brand { font-weight: bold; font-size: 20px; } .site-header { position: relative; background-color:rgba(222,247,255,0.5); } .site-header__start { display: flex; align-items: center; } .site-header__end { display: flex; align-items: center; } .site-header__wrapper { display: flex; justify-content: space-between; align-items: center; padding-top: 1rem; padding-bottom: 1rem; } @media (min-width: 800px) { .site-header__wrapper { padding-top: 0; padding-bottom: 0; } } @media (min-width: 800px) { .nav__wrapper { display: flex; } } @media (max-width: 799px) { .nav__wrapper { position: absolute; top: calc(100%); right: 0; left: 0; z-index: -1; background-color: rgba(222,247,255,0.7); visibility: hidden; opacity: 0; transform: translateY(-100%); transition: transform 0.3s ease-out, opacity 0.3s ease-out; } .nav__wrapper.active { visibility: visible; opacity: 1; transform: translateY(0); } } .nav__item:not(:last-child) { margin-right: 0.5rem; } .nav__item a { display: block; padding: 1rem; border-left: 4px solid transparent; } @media (min-width: 800px) { .nav__item a { text-align: center; border-left: 0; border-bottom: 4px solid transparent; } } .nav__item svg { display: inline-block; vertical-align: middle; width: 28px; height: 28px; margin-right: 1rem; } @media (min-width: 800px) { .nav__item svg { display: block; margin: 0 auto 0.5rem; } } .nav__item.active a { border-left-color: #222; } @media (min-width: 800px) { .nav__item.active a { border-bottom-color: #222; } } .nav__toggle { display: none; } @media (max-width: 799px) { .nav__toggle { display: block; position: absolute; right: 1rem; top: 0.3rem; } } .search { display: flex; margin-left: 1rem; } .search__toggle { appearance: none; order: 1; font-size: 0; width: 34px; height: 34px; background: url("../img/header-3/search.svg") center right/22px no-repeat; border: 0; display: none; } @media (min-width: 800px) { .search__toggle { border-left: 1px solid #979797; padding-left: 10px; } } @media (max-width: 799px) { .search__toggle { position: absolute; right: 5.5rem; top: 0.65rem; background: url("../img/header-3/search.svg") center/22px no-repeat; } } .search__form { display: block; } .search__form.active { display: block; } @media (max-width: 799px) { .search__form { position: absolute; left: 0; right: 0; top: 100%; } .search__form input { width: 100%; } } .search__form input { min-width: 200px; appearance: none; border: 0; background-color: #fff; border-radius: 0; font-size: 16px; padding: 0.5rem; } @media (max-width: 799px) { .search__form input { border-bottom: 1px solid #979797; } } .inactive-item { opacity: 0; } /*header_end*/ html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,b,u,i,center,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td,article,aside,canvas,details,embed,figure,figcaption,footer,header,hgroup,menu,nav,output,ruby,section,summary,time,mark,audio,video{margin:0;padding:0;border:0;}article,aside,details,figcaption,figure,footer,header,hgroup,menu,nav,section{display:block}body{line-height:1}ol,ul{list-style:none}blockquote,q{quotes:none}blockquote:before,blockquote:after,q:before,q:after{content:'';content:none}table{border-collapse:collapse;border-spacing:0} body { background-color: rgb(79, 164, 255); } .noticebox { position:relative; padding-top:130px; background-color: rgb(255, 102, 6); } .notice { position:absolute; text-align: center; color:white; bottom: 0; left: 50%; 	transform: translateX(-50%); } .openbtn7{ position: relative; background:#83179E; cursor: pointer; width: 50px; height:50px; border-radius: 5px; } .openbtn7 .openbtn-area{ transition: all .4s; } .openbtn7 span{ display: inline-block; transition: all .4s; position: absolute; left: 14px; height: 3px; border-radius: 2px; background: #fff; width: 45%; } .openbtn7 span:nth-of-type(1) { top:15px; } .openbtn7 span:nth-of-type(2) { top:23px; } .openbtn7 span:nth-of-type(3) { top:31px; } .openbtn7.active .openbtn-area{ transform: rotateY(-360deg); } .openbtn7.active span:nth-of-type(1) { top: 18px; left: 18px; transform: translateY(6px) rotate(-135deg); width: 30%; } .openbtn7.active span:nth-of-type(2) { opacity: 0; } .openbtn7.active span:nth-of-type(3){ top: 30px; left: 18px; transform: translateY(-6px) rotate(135deg); width: 30%; } .container { padding-top:140px; } .favicon { height:90px; width:auto; } .yumablog_favicon { height:55px; width:55px; } a:focus { outline-color:red; outline-width:50px; } .explain { text-align:center; margin-bottom:3em; line-height:3em; border-bottom: 10px solid rgba(255,255,255,0.5); color:#222; } @media (max-width: 800px) { .site-header__wrapper {padding:0;} .favicon { height:60px; } .container { padding-top:90px; } .explain { line-height:2em; } } footer { margin-top:4em; color:white; text-align: center; }
    body {
        background-color: #333333;
        color: #00FF00;
    }
    input[type=submit]{
        display:block;
        cursor: pointer;
        width:90%;
        margin:10px auto;
        padding:10px;
        background-color:rgba(244, 192, 104,0.8);
        color:white;
        font-size: 1em;
        border:0;
        border-radius:10px;
    }
    input[type=submit]:hover {
        background-color: grey;
    }
    .explain {
        padding-top:90px;
        color:#00FF00;
        text-align:center;
    }

    textarea {
       overflow-y: auto;
    background-color: rgb(249, 251, 254);
    margin-top: 24px;
    display: block;
    width: 50%;
    padding:16px;
    background-color: rgb(255, 255, 255);
    border: 1px solid rgb(186, 198, 211);
    border-radius: 3px;
    font-size: 0.75rem;
    height: 200px;
    font-family: inherit;

}
#result {
    width:50%;
    background-color: black;
}

#predictions {
position:absolute;
cursor: pointer;

}
.prediction {
    font-size:0.7em;
    color: #444;
    background-color:#f8f4e6;
    border-top:1px solid black;
    width:auto;
}
.prediction:hover {
color:red;
}
.test {
    color:red;
}
</style>
<body>
<!-- Header Start --> <header class="site-header" style="position:fixed;width:100%;z-index:100;"> <div class="wrapper site-header__wrapper"> <div class="site-header__start"> <a href="https://yuma4869.com" class="brand"><img src="4869_favicon.png" alt="yuma4869_favicon" class="favicon"></a> </div> <div class="site-header__end"> <nav class="nav"> <div class="nav__toggle" aria-expanded="false" type="button"> <div class="openbtn7"><div class="openbtn-area"><span></span><span></span><span></span></div></div> <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script> <script src="https://coco-factory.jp/ugokuweb/wp-content/themes/ugokuweb/data/5-2-7/js/5-2-7.js"></script> </div> <ul class="nav__wrapper"> <li class="nav__item"> <a href="https://yuma4869.com"> <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false" xmlns="http://www.w3.org/2000/svg" > <path d="M22,9.45,12.85,3.26A1.52,1.52,0,0,0,12,3a1.49,1.49,0,0,0-.84.26L2,9.45,3.06,11,4,10.37V20a1,1,0,0,0,1,1h5V16h4v5h5a1,1,0,0,0,1-1V10.37l.94.63Z" class="active-item" style="fill-opacity: 1" ></path> <path d="M22,9.45L12.85,3.26a1.5,1.5,0,0,0-1.69,0L2,9.45,3.06,11,4,10.37V20a1,1,0,0,0,1,1h6V16h2v5h6a1,1,0,0,0,1-1V10.37L20.94,11ZM18,19H15V15a1,1,0,0,0-1-1H10a1,1,0,0,0-1,1v4H6V8.89l6-4,6,4V19Z" class="inactive-item" style="fill: currentColor" ></path> </svg> <span>Tools</span> </a> </li> <li class="nav__item"> <a href="https://yuma4869.com/about"> <svg version="1.1" id="_x31_0" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 24px; height: 24px; opacity: 1;" xml:space="preserve"> <style type="text/css"> .st0{fill:#374149;} </style> <g> <polygon class="st0" points="332.691,0 179.313,0 79.539,99.77 79.539,202.016 79.539,202.641 79.539,202.641 79.539,202.805 184.883,202.805 184.883,105.477 184.883,105.336 326.848,105.336 327.122,105.336 327.122,197.234 229.656,294.699 229.656,384.289 334.996,384.289 334.996,297.961 432.461,200.496 432.461,99.77 	" style="fill: rgb(0, 0, 0);"></polygon> <polygon class="st0" points="334.996,415.782 334.996,415.617 229.656,415.617 229.656,512 334.996,512 334.996,416.07 335,415.782 	" style="fill: rgb(0, 0, 0);"></polygon> </g> </svg> <span>yuma4869.comとは？</span> </a> </li> <li class="nav__item"> <a href="https://yuma4869.com/me"> <svg viewBox="0 0 24 24" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false" xmlns="http://www.w3.org/2000/svg" > <path d="M16,17.85V20a1,1,0,0,1-1,1H1a1,1,0,0,1-1-1V17.85a4,4,0,0,1,2.55-3.73l2.95-1.2V11.71l-0.73-1.3A6,6,0,0,1,4,7.47V6a4,4,0,0,1,4.39-4A4.12,4.12,0,0,1,12,6.21V7.47a6,6,0,0,1-.77,2.94l-0.73,1.3v1.21l2.95,1.2A4,4,0,0,1,16,17.85Zm4.75-3.65L19,13.53v-1a6,6,0,0,0,1-3.31V9a3,3,0,0,0-6,0V9.18a6,6,0,0,0,.61,2.58A3.61,3.61,0,0,0,16,13a3.62,3.62,0,0,1,2,3.24V21h4a1,1,0,0,0,1-1V17.47A3.5,3.5,0,0,0,20.75,14.2Z" class="inactive-item" style="fill-opacity: 1" ></path> <path d="M20.74,14.2L19,13.54V12.86l0.25-.41A5,5,0,0,0,20,9.82V9a3,3,0,0,0-6,0V9.82a5,5,0,0,0,.75,2.63L15,12.86v0.68l-1,.37a4,4,0,0,0-.58-0.28l-2.45-1V10.83A8,8,0,0,0,12,7V6A4,4,0,0,0,4,6V7a8,8,0,0,0,1,3.86v1.84l-2.45,1A4,4,0,0,0,0,17.35V20a1,1,0,0,0,1,1H22a1,1,0,0,0,1-1V17.47A3.5,3.5,0,0,0,20.74,14.2ZM16,8.75a1,1,0,0,1,2,0v1.44a3,3,0,0,1-.38,1.46l-0.33.6a0.25,0.25,0,0,1-.22.13H16.93a0.25,0.25,0,0,1-.22-0.13l-0.33-.6A3,3,0,0,1,16,10.19V8.75ZM6,5.85a2,2,0,0,1,4,0V7.28a6,6,0,0,1-.71,2.83L9,10.72a1,1,0,0,1-.88.53H7.92A1,1,0,0,1,7,10.72l-0.33-.61A6,6,0,0,1,6,7.28V5.85ZM14,19H2V17.25a2,2,0,0,1,1.26-1.86L7,13.92v-1a3,3,0,0,0,1,.18H8a3,3,0,0,0,1-.18v1l3.72,1.42A2,2,0,0,1,14,17.21V19Zm7,0H16V17.35a4,4,0,0,0-.55-2l1.05-.4V14.07a2,2,0,0,0,.4.05h0.2a2,2,0,0,0,.4-0.05v0.88l2.53,1a1.5,1.5,0,0,1,1,1.4V19Z" class="active-item" style="fill: currentColor" ></path> </svg> <span>お前誰？</span> </a> </li> <li class="nav__item"> <a href="https://forms.gle/bBBU7JRkfQpd9h6Y9"> <svg viewBox="0 0 32 32" width="24px" height="24px" x="0" y="0" preserveAspectRatio="xMinYMin meet" class="nav-icon" focusable="false" xmlns="http://www.w3.org/2000/svg"> <!-- メールアイコン --> <title/><g id="mail"><path d="M29,6H3L2.92,6a.78.78,0,0,0-.21,0l-.17.07a.65.65,0,0,0-.15.1.67.67,0,0,0-.15.14l-.06.06a.36.36,0,0,0,0,.09,1.08,1.08,0,0,0-.08.19A1.29,1.29,0,0,0,2,6.9S2,7,2,7V25a1,1,0,0,0,1,1H29a1,1,0,0,0,1-1V7A1,1,0,0,0,29,6ZM16,14.81,6.2,8H27.09ZM4,24V8.91l11.43,7.91,0,0a1.51,1.51,0,0,0,.18.09l.08,0A1.09,1.09,0,0,0,16,17h0a1,1,0,0,0,.41-.1l.07,0,0,0L28,9.79V24Z"/></g> </svg> <span>問い合わせ</span> </a></li><li class="nav__item"><a href="https://yuma4869.com/security"><svg version="1.1" id="_x32_" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 512 512" style="width: 32px; height: 32px; opacity: 1;" class="nav-icon" xml:space="preserve"><style type="text/css">.st0{fill:#4B4B4B;}</style><g><path class="st0"d="M435.209,96.685l-19.627-1.077c-53.229-2.957-99.37-23.39-126.611-56.099L255.999,0l-32.98,39.509c-27.24,32.709-73.391,53.142-126.611,56.099l-40.497,2.24v187.094c0,26.61,8.059,51.698,20.878,74.642c44.26,79.84,144.978,134.496,159.311,142.02L255.999,512l19.891-10.396c18.454-9.678,180.198-97.664,180.198-216.662V97.848L435.209,96.685z M98.737,261.106c0-46.326,0-122.674,0-122.674c64.333-3.579,121.509-28.578,157.263-71.5v194.174h157.247v23.836c0,96.501-157.247,178.668-157.247,178.668V261.106H98.737z"style="fill: rgb(75, 75, 75);"></path></g></svg><span>セキュリティ</span></a></li> <li class="nav__item"> <a href="https://yumasblog.net"> <img src="yumablog_favicon.png" alt="yumablog_favicon" class="yumablog_favicon"> </a> </li> </div> </div> <script> var navWrapper = document.querySelector(".nav__wrapper"); $(".openbtn7").click(function () { $(this).toggleClass('active'); if (navWrapper.classList.contains("active")) { this.setAttribute("aria-expanded", "false"); this.setAttribute("aria-label", "menu"); navWrapper.classList.remove("active"); } else { navWrapper.classList.add("active"); this.setAttribute("aria-label", "close menu"); this.setAttribute("aria-expanded", "true"); } }); </script> </header> <noscript> <p>あなたのブラウザではjavascriptが使えません。</p> <p>サービスが正常に機能しない場合があります。</p> </noscript> <!-- Header End -->
<div class="explain">
    <h1>machineConverter | yuma4869</h1>
    <h1 style="font-size:1em;font-family:solid">このサイトでは機械で実行されている「機械語（マシン語）」を見ることができます。c → アセンブル → 機械語としています。詳しいことは<a href="/" style="background-color:red;color:white;border-radius:15px">ブログ</a></h1>
    <h3>0と1だけの世界、楽しんでね！</h3>
    <p>01111001 01110101 01101101 01100001 00110100 00111000 00110110 00111001</p>
</div>

<div class="inputCode">
    <h2>C言語のコードを入力してください <strong>tabを押すと補完が使えます。!の補完はテンプレートです</strong></h2>
    <p>コンパイルエラーが出ない正しいコードで入力してください</p>
    <form method="post" action="index.php">
    <div class="flex" style="display: flex;">
    <textarea name="code" id="inputCode" oninput="updatePredictions()" onkeydown="checkKeyPress(event)"></textarea>
    <div id="result"><?php echo $machineLanguage ?></div>
    </div>
    <div id="predictions" style="height: 1.2em;position: absolute;"></div>
        <input type="submit" value="送信" name="submit">
    </form>
</body>
</html>
</div>
</body>
</html>
