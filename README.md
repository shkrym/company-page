## 概要

このリポジトリは、wp-env を利用した WordPress の開発環境を構築するためのものです。テーマの開発は Vite を使用し、開発効率を向上させています。

## wp-env の操作

- 起動: `npm run start` コマンドを実行すると、Docker コンテナである wp-env が起動します。  
- 停止: `npm run stop` コマンドで Docker コンテナである wp-env を停止します。  
- 削除: `npm run remove` コマンドで Docker コンテナである wp-env を削除します。

## ブラウザでのアクセス

WordPress には http://127.0.0.1 でアクセスできます。  
管理画面へのログインは、http://127.0.0.1/wp-login.php から行います。

ユーザー名: admin  
パスワード: password

## テーマの編集

テーマファイルは `themes` フォルダに配置されています。  
`themes/smiron-hp` がメインのテーマフォルダです。

## CSS・JS のビルド

CSS ファイルは `src/css`、JS ファイルは `src/js` に配置します。

`app.css` がメインの CSS ファイルです。Tailwind CSS を使用しています。

`app.js` がメインの JS ファイルです。

`app-fa.css` は FontAwesome 用の CSS ファイルです。

Bootstrap を利用する場合は、`src/scss/app-bs.scss` を使用します。

### ビルド

- `npm run build`: 本番環境用のビルド  
- `npm run dev`: 開発環境用のビルド (自動リロード機能付き) 

`src` フォルダと `themes` フォルダ内のファイルを編集すると、自動的にブラウザが更新されます。

## データベース

### インポート

SQL ダンプファイルは `sql/db.sql` に配置します。  
`npm run db:import` コマンドでインポートします。

### SQL 文の実行

`sql/update.sql` を編集し、`npm run db:update` で実行します。

### PhpMyAdmin

http://1247.0.0.1:4040 でアクセスできます。

ユーザー名: root  
パスワード: password