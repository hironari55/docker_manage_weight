<p align="center">
  <img src="./manage-weight-cover.png" alt="" width="100%">
</p>


# 制作背景
体重や体脂肪率などを記録して折れ線グラフなどで記録を可視化することで体づくりのモチベーションをアップするアプリです。想定しているユーザーとしては、筋トレやダイエットをする習慣のある人を想定しています。スマホのメモや紙に記録するのは手間がかかるため、WEB上で記録、管理できるサービスを制作しました。解決したい課題として、「筋肉が増えている、ダイエットが成功している」事を分かりやすく実感したいという欲求の解決を目指してつくりました。



# URL
- URL: http://manage-weight.link
- ゲストログインボタンで簡単にログインできます。
<p align="center">
  <img src="./guest-login.png" alt="" width="100%">
</p>



# ER図
<p align="center">
  <img src="./ER.png" alt="" width="100%">
</p>



# インフラ構成図
<p align="center">
  <img src="./infrastructure.png" alt="" width="100%">
</p>



# 使用技術
- php 7.2
- Laravel 6.2
- HTML
- CSS
- jQuery
- DB: MySQL
- Webサーバー: Apache



# 機能一覧
|      |  機能 |
| ---- | ---- |
|  1   |  アカウント登録機能  |
|  2  |  ログイン機能  |
|  3  |  ゲストログイン機能  |
|  4  |  ログアウト機能  |
|  5  |  体重記録機能(CRUD)  |
|  6  |  記録内容更新機能(CRUD)  |
|  7  |  体重記録折れ線グラフ機能(jQuery)  |
|  8  |  体重記録一覧機能  |
|  9  |  使い方機能  |

# 何ができるのか

### トップページ

<p align="center">
  <img src="./manage-weight-login.png" alt="" width="100%">
</p>

- 最初にトップページにアクセスするとログイン画面に遷移します。
- ヘッダーに会員登録、ログインを配置、ログインフォーム下にパスワード再設定を配置。<br>また、スマホユーザーにわかりやすいようログインフォーム下にも会員登録を配置しております。
