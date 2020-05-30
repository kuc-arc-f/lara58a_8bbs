# lara58a_8bbs

 Version: 0.9.1

 Author  : Kouji Nakashima / kuc-arc-f.com

 date    : 2020/05/28

 update : 2020/05/30

***

Laravel 5.8 + mysql , bbs app sample

* PWA 対応

* Google ログイン対応

***
### setup
php composer.phar create-project --prefer-dist laravel/laravel lara58a "5.8.*"

helper:

php composer.phar require laravelcollective/html "5.8.*"

* .env.local を参考に、 .env 修正下さい

***
### start

php artisan serve


***
### blog

https://knaka0209.hatenablog.com/entry/lara58_27bbs

* chat設定ですが、参考の .env 設定

https://knaka0209.hatenablog.com/entry/lara58_25chat

***
### UI

* bbs/show , reply input etc
![ img-1 ](https://raw.githubusercontent.com/kuc-arc-f/screen-img/master/web/bbs/ss-bbs-show.png)

* bbs / index
![ img-1 ](https://raw.githubusercontent.com/kuc-arc-f/screen-img/master/web/bbs/ss-bbs-index.png)

* message/index, new BBS reply receive message and  notification API display
![ img-1 ](https://raw.githubusercontent.com/kuc-arc-f/screen-img/master/web/bbs/ss-bbs-msg-0525b.png)

***



