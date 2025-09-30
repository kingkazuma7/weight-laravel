<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightClassController; // ★ 1. コントローラをインポート

Route::get('/', function () {
    return view('welcome');
});

// ★ 2. 新しいルートを定義
// GETリクエストで'/weight-classes'にアクセスが来たら、
// WeightClassControllerのindexメソッドを実行する
Route::get('/weight-classes', [WeightClassController::class, 'index']);
