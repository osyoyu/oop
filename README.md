OreOrePHP - Yet Another オレオレPHPフレームワーク
=================================================

学校の課題とかでちょっとしたWebアプリケーションをPHPで作らなければならなくなった際に少し便利なMVCもどきフレームワークです。

## あるもの、ないもの
* Controller - ない
* Model - `/oop-model`以下にそれっぽいものがある
* View - 申し訳程度にある (`render()`)


## Getting Started
* `git submodule https://github.com/osyoyu/oop bin` とかでアプリケーションのルートあたりに `bin` を持ってくる
* サーバーの設定で `/bin` 以下へのアクセスを弾くと良いと思います
* いわゆるコントローラーは `/` に全部平置きする
* コントローラーの頭で `require_once(dirname(__FILE__) . "/bin/oop.php");` みたいな感じで読み込む
  - `Config` クラスが自動的に定義され、`Config.read('app_root')` でアプリケーションのルートへのパスが返ってくるので、以後はそちらを使うと良いと思います
* コントローラーの終わりで `render("view_name", $binding)` を呼ぶと出力が開始されます
  - `/app/view/layout.php` があると自動的に layout として適用されます
  - `$binding` は View を担う PHP ファイルに渡したい(配列)変数です。View 側からは `$binding` でアクセスできます


## できないこと
* ルーティング
  - 普通に PHP にアクセスする以外の方法はないので頑張ってください
  - 階層構造を作りたいなら普通にディレクトリを掘るだけでOKですが、試したことはないです
  - 実装するつもりは少しありますが、課題だと直接 PHP ファイルを叩く、みたいなケースが多いのでしないかもしれません


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
* `Item::query()->where(["name" => "hoge"])->call();`
* `Item::query()->where("name LIKE :name AND price < 3000", ["name" => "%プリパラ%"]);` ( **未実装** )

### INSERT
`Item::create(["name" => "プリパス アイドルリンク", "price" => 6250]);`


## 例
https://github.com/osyoyu/oop-app にこのフレームワークを使った「ユーザビリティが最悪な Amazon もどき」があります。


## ライセンス
GPLv3
