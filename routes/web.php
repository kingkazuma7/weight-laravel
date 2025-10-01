<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeightClassController;
use App\Http\Controllers\SitemapController;

// トップページでWeightClassを表示
Route::get('/', [WeightClassController::class, 'index']);

// サイトマップ
Route::get('/sitemap.xml', [SitemapController::class, 'index']);
Route::get('/sitemap/weight-classes.xml', [SitemapController::class, 'weightClasses']);

// ★ 2. 新しいルートを定義
// GETリクエストで'/weight-classes'にアクセスが来たら、
// WeightClassControllerのindexメソッドを実行する
// Route::get('/weight-classes', [WeightClassController::class, 'index']);
