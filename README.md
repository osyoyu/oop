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
* コントローラーの終わりで `render("view_name", ビューに渡したい連想配列, "layout_name")` みたいにします (layout は省略可能)


## できないこと
* ルーティング
  - 普通に PHP にアクセスする以外の方法はないので頑張ってください
  - 階層構造を作りたいなら普通にディレクトリを掘るだけでOKですが、試したことはないです


## OOP-Model
DBは `app_root` 直下の `db.sqlite3` 決め打ちになります

### SELECT
`Item::query()->where(["name" => "hoge"])->call();`


## 例
https://github.com/osyoyu/oop-app

## ライセンス
GPLv3
