<!DOCTYPE html>
<html>
<head>
    <title>予測変換の実装</title>
    <script src="/predictions.js"></script>

</head>
<body>
    <textarea id="inputCode" oninput="updatePredictions()" onkeydown="checkKeyPress(event)"></textarea>
    <div id="predictions"></div>
    <style>
                #predictions {
            position: absolute;
            top: 50px;
            left: 10px;
            cursor: pointer;
        }
        .prediction:hover {
            color:red;
        }
    </style>
    <script src="/predictions.js"></script>
</body>
</html>
