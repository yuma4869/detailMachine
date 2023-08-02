        // 予測変換の辞書データ
        const predictionData = {
            "#include": "#include",
            "int main": "int main() {\n\n    return 0;\n}",
            "printf": 'printf("Hello, World!\\n");',
            "scanf": 'scanf("%d", &variable);',
            "if": "if (condition) {\n\n}",
            "else": "else {\n\n}",
            "for": "for (int i = 0; i < count; i++) {\n\n}",
            "while": "while (condition) {\n\n}",
            "int":"int",
            "char":"char",
        };
        
        
                // 予測変換の候補を更新する関数
                function updatePredictions() {
                    const inputCodeElement = document.getElementById("inputCode");
                    const start = inputCodeElement.selectionStart;
                    const input = inputCodeElement.value.substring(0, start);
                    const lines = input.split("\n");
                    const lastLine = lines[lines.length - 1];
                    const words = lastLine.split(/[\s\t]+/);
                    const lastWord = words[words.length - 1];
                    const predictions = [];
                
                    if (lastWord.trim().length > 0) {
                        for (const key in predictionData) {
                            if (key.startsWith(lastWord)) {
                                predictions.push(predictionData[key]);
                            }
                        }
                    }
                
                    const predictionsElement = document.getElementById("predictions");
                    if (predictions.length > 0) {
                        const predictionList = predictions.map((prediction, index) => `<div class="prediction${index === 0 ? " selected" : ""}" onclick="applyPrediction('${prediction}')">${prediction}</div>`).join("");
                        predictionsElement.innerHTML = "Predictions: " + predictionList;
                
                        // 入力欄のカーソル位置を取得
                        const cursorPosition = getCursorPosition(inputCodeElement);
                        // 予測変換の候補を入力欄のカーソル位置の少し下に表示
                        console.log(cursorPosition.top);
                        predictionsElement.style.top = `${cursorPosition.top + 30}px`;
                        predictionsElement.style.left = `${cursorPosition.left + 10}px`;
                    } else {
                        predictionsElement.innerText = "";
                    }
                }
                
                // 入力欄のカーソル位置を取得する関数
// 入力欄のカーソル位置を取得する関数
function getCursorPosition(input) {
    if (!input.firstChild) {
        input.appendChild(document.createTextNode(""));
    }

    const range = document.createRange();
    range.setStart(input.firstChild, input.selectionEnd);
    range.setEnd(input.firstChild, input.selectionEnd);

    const rect = range.getBoundingClientRect();
    const scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
    const scrollLeft = document.documentElement.scrollLeft || document.body.scrollLeft;
    return {
        top: rect.top + scrollTop,
        left: rect.left + scrollLeft
    };
}


                
                
                
        
        
        
                // キーコードを監視してタブキーが押された場合に予測変換を入力欄に反映
        function checkKeyPress(event) {
            const inputCodeElement = document.getElementById("inputCode");
            const key = event.keyCode || event.which;
        
            if (key === 9) { // タブキーのキーコードは9
                event.preventDefault(); // タブキーのデフォルトの動作を抑制
        
                const selectedPrediction = document.querySelector(".prediction.selected");
                if (selectedPrediction) {
                    const predictionText = selectedPrediction.innerText;
                    applyPrediction(predictionText);
                } else {
                    // 予測変換の候補が表示されていない場合は、通常のタブを反映
                    const start = inputCodeElement.selectionStart;
                    const end = inputCodeElement.selectionEnd;
                    const textBeforeCursor = inputCodeElement.value.substring(0, start);
                    const textAfterCursor = inputCodeElement.value.substring(end);
                    inputCodeElement.value = textBeforeCursor + "\t" + textAfterCursor;
                    inputCodeElement.focus();
                    inputCodeElement.setSelectionRange(start + 1, start + 1);
                }
            }
        }
        
        
        
        
        function applyPrediction(predictionText) {
            const inputCodeElement = document.getElementById("inputCode");
            const start = inputCodeElement.selectionStart;
            const end = inputCodeElement.selectionEnd;
            const textBeforeCursor = inputCodeElement.value.substring(0, start);
            const textAfterCursor = inputCodeElement.value.substring(end);
            const linesBeforeCursor = textBeforeCursor.split("\n");
            const lastLineBeforeCursor = linesBeforeCursor[linesBeforeCursor.length - 1];
            const wordsInLastLineBeforeCursor = lastLineBeforeCursor.split(" ");
            wordsInLastLineBeforeCursor.pop();
            const newLastLineBeforeCursor = wordsInLastLineBeforeCursor.join(" ");
            linesBeforeCursor[linesBeforeCursor.length - 1] = newLastLineBeforeCursor;
            const newTextBeforeCursor = linesBeforeCursor.join("\n");
            inputCodeElement.value = newTextBeforeCursor + (newTextBeforeCursor.length > 0 && !newTextBeforeCursor.endsWith("\n") ? " " : "") + predictionText + textAfterCursor;
            inputCodeElement.focus();
            inputCodeElement.setSelectionRange(newTextBeforeCursor.length + predictionText.length + (newTextBeforeCursor.length > 0 && !newTextBeforeCursor.endsWith("\n") ? 1 : 0), newTextBeforeCursor.length + predictionText.length + (newTextBeforeCursor.length > 0 && !newTextBeforeCursor.endsWith("\n") ? 1 : 0));
            updatePredictions();
        }