<?php

namespace App\Http\Controllers;

use App\Models\WeightClass; // ★ 1. モデルをインポート
use Illuminate\Http\Request;

class WeightClassController extends Controller
{
    /**
     * すべての階級データを取得し、Viewに渡す (HTTP GET /weight-classes に対応)
     */
    public function index()
    {
        // ★ 2. Eloquent ORMを使ってデータを取得
        // 全データを取得し、格闘技の種類(type)でソートしています
        $classes = WeightClass::orderBy('type')->get();
            
        // ★ 3. データをViewに渡して表示
        // 'weight_classes'というViewに、取得したデータを'classes'という名前で渡す
        return view('weight_classes', compact('classes'));
    }
}
