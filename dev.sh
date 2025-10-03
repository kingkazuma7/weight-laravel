#!/bin/bash

# SCSSコンパイルをバックグラウンドで実行
sass resources/css:public/css --watch &

# Laravel開発サーバーを実行
php artisan serve

# 終了時にバックグラウンドプロセスも終了
trap "kill 0" EXIT
