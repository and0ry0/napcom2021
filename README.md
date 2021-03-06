# napcom2021

A simple theme for gaming media.
Designed by [@sasigume](https://github.com/sasigume)

**This theme requires WordPress 5.5+**

## カスタマイザー

**「外観」👉「カスタマイズ」でロゴなどを変更できます。**

## テーマ側で定義している機能について

ショートコード機能は消したので、[Shortcoder](https://wordpress.org/plugins/shortcoder/)で管理してください。

現在**以下の「テーマを選ぶだけで有効化される」機能の廃止を予定しています。**

- 投稿公開前の注意アラート

- その他編集画面のカスタマイズをする関数

あまりテーマに機能を依存すると、他環境への引継ぎに支障が出るので、プラグインでできることはプラグインに任せてください。

## デザインの更新方法

以下は `v4.0.0` 時点の情報です。

### 初回のみ: パッケージのインストール

```bash
npm install
```

### purge とは

`purge`とは、html で使われている class/id の CSS のみを抽出する工程のことです。なお、**記事の中身の CSS はテンプレートに書いていないため purge 対象から除外しています。**

### VS Code ユーザーへ

`.vscode/tasks.json` に build のタスクを設定しています。デフォルトでは`⌘Cmd+⇧Shift+B`で実行されるのでご活用ください。

### テスト環境で開発する

```bash
npm run build:css
```

で、purge 済みと purge していない css が両方書き出されます。

そして、`wp-config.php` で環境を`development`に変えてください。

```php
define( 'WP_ENVIRONMENT_TYPE', 'development' );
```

#### ロードされる CSS

| `WP_ENVIRONMENT_TYPE`      | ロードされる CSS       | purge されてる?       |
| -------------------------- | ---------------------- | --------------------- |
| `production`               | `output/style.css`     | :white_check_mark:    |
| `development` \|\| `local` | `output/style-dev.css` | :white_medium_square: |

開発環境でなら、CSS を書き出しなおさずに初めて使う class も試すことができます。

この部分のメカニズムは[こちら](https://qiita.com/sasigume/items/b64109e919ed4253ce64)

### レイアウトや文字色などの編集

**Tailwind CSS**を使っていますので、基本的に以下のドキュメントを参照しながら`class`を追加してください。

https://tailwindcss.com/

### プリセット・変数の利用

`tailwind.config.js`で、色などの変数を自分で追加できます。

もしそれでも不可能な独自のスタイルを追加指定する場合は、以下のファイルを編集してください。

- `styles/style.css` : 閲覧者が見る部分のスタイル
- `styles/editor-style.css` : 管理画面で記事を編集する際のスタイル

Tailwind の`@apply`を活用すれば短い CSS で済みます。

**変数や独自のスタイルを編集した後は、必ず build しないと変更が反映されません。**

### コミット前には

- ``npm run build:css` を実行して必要なスタイルを書き出してください。
- **`wp-config.php`の環境の指定をコメントアウトして、本番環境のエミュレーションをしてください。**

### `/sass`は使っていません

`scss/`以下は旧デザインの参照用データです。コンパイルしてもロードされませんのでご注意ください。

### トラブルシューティング

- `postcss.config.js`がおかしいと動きません。真っ先にこのファイルの書き間違いを疑いましょう。
- `tailwind.config.json`の構文がおかしいと書き出しできません。

---

## 作るうえでの参考

### Theme customizer

https://maddisondesigns.com/2017/05/the-wordpress-customizer-a-developers-guide-part-1/

### PostCSS + tailwind CSS with WordPress

https://viarami.com/programming/tailwind-css-wordpress-theme/

### 警告

https://premium.wpmudev.org/blog/adding-admin-notices/

### Gutenberg の CSS

https://qiita.com/youthkee/items/3c8b8f91314727d40d3f
