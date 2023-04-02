# てらリンク | TeraLink

てらリンク（以下、本アプリ）は、寺院の情報をユーザーへ発信し、インターネット上で寺院とユーザーとのやり取りをするアプリケーションです。昨今のコロナ禍に伴い、寺院の活動が制限されている課題に対し、インターネット上で寺院とのやり取りを行うことで、非対面でも関わりを繋げていくために開発しました。

# 利用方法

## 通常ユーザー

1. 本アプリのログイン画面にアクセスして新規登録 https://teralink-project.herokuapp.com/register
2. 登録、ログイン後、寺院のイベントとニュースが閲覧できます。

## 管理者

1. 本アプリのログイン画面にアクセス https://teralink-project.herokuapp.com/login
2. 管理者名でログイン後、寺院のイベントとニュースの作成、編集、削除ができます。

# 機能

- ログイン機能
- イベント、ニュースの CRUD 機能

# 使用技術

## フロントエンド

- HTML
- CSS
- JavaScript
- JQuery
- TailwindCSS

## バックエンド

- PHP
- Laravel
- composer
- PostgreSQL

## インフラ

- Heroku(デプロイ環境)
- AWS(EC2 Cloud9)

## その他

- Git
- GitHub
- Figma

# 今後の更新予定

- 出席周知機能

イベントページで出席/欠席ボタンを配置し、出席/欠席を寺院側へ周知する機能を追加予定です。通常ユーザー側は出席したイベントを一覧で表示できるようになり、管理者側は出席予定のユーザー数、ユーザー名が表示されます。

- お問い合わせフォーム

ユーザーは管理者に対して、フォームを通じて連絡を取ることができます。

# 作成者

- Github 名：Private-Kawa
- Github リンク：https://github.com/Private-Kawa/teralink-project
