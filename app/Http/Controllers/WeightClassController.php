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
        // 全データを取得し、格闘技の種類(type)でグループ化
        $classes = WeightClass::all()
            ->sortBy(function ($class) {
                // 体重制限で降順ソート（大きい順）
                return -$class->getWeightLimitValue();
            })
            ->sortBy('type'); // 格闘技の種類でソート
            
        return view('weight_classes', compact('classes'));
    }
}
