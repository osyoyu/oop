OreOrePHP - Yet Another オレオレPHPフレームワーク
=================================================

学校の課題とかでちょっとしたWebアプリケーションをPHPで作らなければならなくなった際に少し便利なMVCもどきフレームワークです。


## あるもの、ないもの
* Controller - Controller と呼べるものはない。普通に PHP ファイルを配置して、それぞれで `oop.php` を読み込んでもらう形になる（後述）。
* Model - `/oop-model` 以下にそれっぽいものがある
* View - 申し訳程度にある ( `render()` )


## Getting Started
* `git submodule https://github.com/osyoyu/oop bin` とかでアプリケーションのルートあたりに `bin` を持ってくる
* サーバーの設定で `/bin` 以下へのアクセスを弾くと良い
* いわゆるコントローラーは `/` に全部平置きする
* コントローラーの頭で `require_once(dirname(__FILE__) . "/bin/oop.php");` みたいな感じで読み込む
  - `Config` クラスが自動的に定義され、`Config.read('app_root')` でアプリケーションのルートへのパスが返ってくるので、以後はそちらを使うと良い
* コントローラーの終わりで `render("view_name", $binding)` を呼ぶと出力が開始される
  - `/app/view/layout.php` があると自動的に layout として適用される
  - `$binding` は View を担う PHP ファイルに渡したい(配列)変数です。View 側からは `$binding` でアクセスできる


## 命名規則
だいたい Rails と同じですが、DB のテーブル名は単数形です。


## OOP-Model
DBは `app_root` 直下の `db.sqlite3` 決め打ちになります。以下は Item テーブルへの操作の例です

### /app/models/Item.php
```
class Item extends BaseModel {
  // フィールド名に対応する変数を定義します
  public $id;
  public $name;
  public $price;
}
```

### SELECT
Model に対して `query()` を呼ぶことで `SelectQuery` オブジェクトが生成され、`where()` や `order_by()` (未実装) をチェーンできます。
`call()` を呼ぶことで実際にDBへのクエリが行われ、最初に呼んだ Model 型のオブジェクトの配列が返ります。ActiveRecord みたいな遅延呼び出し的な機構はありません。

* `Item::query()->where(["name" => "hoge"])->call();`
* `Item::query()->where("name LIKE :name AND price < 3000", ["name" => "%プリパラ%"])->call();` ( **未実装** )

### INSERT
* `Item::create(["name" => "プリパス アイドルリンク", "price" => 6250]);`


## 例
https://github.com/osyoyu/oop-app にこのフレームワークを使った「ユーザビリティが最悪な Amazon もどき」があります。


## ライセンス
GPLv3
