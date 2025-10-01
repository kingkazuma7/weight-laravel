<?php

namespace App\Http\Controllers;

use App\Models\WeightClass;
use Illuminate\Http\Request;
use Artesaos\SEOTools\Facades\SEOTools;

class WeightClassController extends Controller
{
    /**
     * すべての階級データを取得し、Viewに渡す (HTTP GET /weight-classes に対応)
     */
    public function index()
    {
        // SEO設定
        SEOTools::setTitle('格闘技 階級データ一覧 | RIZIN, UFC, ボクシング');
        SEOTools::setDescription('RIZIN, UFC, ボクシングの階級（ウェイトクラス）データを一覧表示。各格闘技の体重制限を詳しく解説。');
        SEOTools::setCanonical(url('/weight-classes'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::twitter()->setCard('summary');
        SEOTools::jsonLd()->setType('WebPage');

        // データ取得
        $classes = WeightClass::orderBy('type')->get();
            
        // ★ 3. データをViewに渡して表示
        // 'weight_classes'というViewに、取得したデータを'classes'という名前で渡す
        return view('weight_classes', compact('classes'));
    }
}
