<?php
function pickupmachineLanguage($string){
    //$originalString = "This;is;a;sample;string;with;multiple;semicolons.";
$searchString = ":"; // 検索する文字列
$length = 12; // 取り出す文字数

$startPosition = 0; // 検索開始位置

$vector = "";

while (($position = strpos($string, $searchString, $startPosition)) !== false) {
    // セミコロンが見つかった場合
    $extractedString = substr($string, $position + 1, $length);
    echo "aaa $extractedString";
    $vector .= $extractedString;
    echo $extractedString . PHP_EOL;
    
    $startPosition = $position + 1; // 次の検索を開始する位置を更新
}
$int = 13;
$outputlang = substr($vector,$int);
$vector = preg_replace('/\s+/', '', $outputlang);
echo $vector;
return $vector;
}

function hexToBinary($hexString) {
    echo "hexstring $hexString end";
    $binaryString = '';
    $length = strlen($hexString);
    echo "len $length";
    for ($i = 0; $i < $length; $i++) {
        $binaryString .= str_pad(base_convert($hexString[$i], 16, 2), 4, '0', STR_PAD_LEFT);
        $binaryString .= " ";
    }
    return $binaryString;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="/predictions.js"></script>
</head>
<style>
    body {
        background-color: #333333;
        color: #00FF00;
    }
    .explain {
        text-align:center;
    }
    
    textarea {
        overflow-y: auto;
    background-color: rgb(249, 251, 254);
    margin-top: 24px;
    display: block;
    width: 100%;
    padding:16px;
    background-color: rgb(255, 255, 255);
    border: 1px solid rgb(186, 198, 211);
    border-radius: 3px;
    font-size: 0.75rem;
    height: 200px;
    font-family: inherit;

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
</style>
<body>
<div class="explain">
    <h1>detailMachine | yuma4869</h1>
    <h3>このサイトでは機械で実行されている「機械語（マシン語）」を見ることができます</h3>
    <h3>0と1だけの世界、楽しんでね！</h3>
    <p>01111001 01110101 01101101 01100001 00110100 00111000 00110110 00111001</p>
</div>

<div class="inputCode">
    <h2>C言語のコードを入力してください</h2>
    <form method="post" action="index.php">
    <div class="position">
    <textarea name="code" id="inputCode" oninput="updatePredictions()" onkeydown="checkKeyPress(event)"></textarea>
    <div id="predictions" style="height: 1.2em;position: absolute;"></div>
    </div>
        <input type="submit" value="送信" name="submit">
        <input type="hidden" name="form_submitted" value="<?php echo isset($_POST['form_submitted']) ? 'true' : 'false'; ?>">
    </form>
</body>
</html>
</div>
</body>
</html>
<?php
        if (isset($_POST["submit"])){
            $file_path = "example.c";
            $code = $_POST["code"];
            echo $code;
            $fp = fopen($file_path, 'w');
            if ($fp !== false) {
                fwrite($fp, $code);
                fclose($fp);
                echo "ファイルにコードを保存しました。";
            } else {
                echo "ファイルをオープンできませんでした。";
            }
            shell_exec("gcc -g -o example example.c");
            $gdb_output = shell_exec('gdb -q -batch -x command.gdb example');

            // 改行コードをHTMLの改行タグに変換して表示
            echo "aaaaa $gdb_output end";
            echo nl2br(htmlspecialchars($gdb_output));
            $file_path = "binary.s";
            $code = $gdb_output;
            $fp = fopen($file_path, 'w');
            if ($fp !== false) {
                fwrite($fp, $code);
                fclose($fp);
                echo "ファイルにコードを保存しました。";
            } else {
                echo "ファイルをオープンできませんでした。";
            }
            shell_exec("gcc -nostartfiles -o binary binary.s");
            $objdump = shell_exec("objdump -d example");
            echo $objdump;
            echo "ahahaha";
            $sixteenlang = pickupmachineLanguage($objdump);
            echo "sixteentest $sixteenlang";
            $intsixteen = str_replace(":","",$sixteenlang);
            echo "inttest $intsixteen";
            $machineLanguage = hexToBinary($intsixteen);
            echo "tesst $machineLanguage finish";
        }
?>
