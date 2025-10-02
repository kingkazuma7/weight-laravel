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
        // Eager Loadingで選手データも一緒に取得（N+1問題を回避）
        $classes = WeightClass::with(['fighters' => function ($query) {
            // チャンピオンを優先して表示
            $query->orderByRaw("CASE WHEN status = 'champion' THEN 1 WHEN status = 'former_champion' THEN 2 ELSE 3 END")
                  ->orderBy('name');
        }])
        ->get()
        ->sortBy(function ($class) {
            // 体重制限で降順ソート（大きい順）
            return -$class->getWeightLimitValue();
        })
        ->sortBy('type'); // 格闘技の種類でソート
            
        return view('weight_classes', compact('classes'));
    }
}
