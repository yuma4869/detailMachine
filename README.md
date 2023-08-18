# machineConverter

C言語のコードを機械語に翻訳するサービスです

## 翻訳の仕方

* gcc -S example.c -o example.s

* gcc example.s -o example.out

のようにしています。

## 二進数の変換方法

* xxd -b example.out

で変換してから

* sed 's/^.*: //' | grep -o [01]

として不要なものを削除しています
