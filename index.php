<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div class="explain">
    <h1>detailMachine | yuma4869</h1>
    <h3>このサイトでは機械で実行されている「機械語（マシン語）」を見ることができます</h3>
    <h3>0と1だけの世界、楽しんでね！</h3>
    <p>01111001 01110101 01101101 01100001 00110100 00111000 00110110 00111001</p>
</div>

<div class="inputCode">
    <h2>C言語のコードを入力してください</h2>
    <form action="index.php">
        <textarea name="code" id="code" cols="30" rows="10">#include<stdio.h></textarea>
        <input type="submit" value="送信" name="submit">
        <input type="hidden" name="form_submitted" value="<?php echo isset($_POST['form_submitted']) ? 'true' : 'false'; ?>">
    </form>
</div>
</body>
</html>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if (isset($_POST["submit"]) && isset($_POST['form_submitted'])){
            $file_path = "example.c";
            $fp = fopen($file_path,'w');
            fwrite($fp,$_POST["code"]);
            fclose($fp);
            shell_exec("gcc -g -o example $file_path");
            shell_exec("gdb example");
            shell_exec("break main");
            shell_exec("run");
            $machineLanguage16 = shell_exec('x/10i $pc');
            echo $machineLanguage16;
        }
    }
?>
