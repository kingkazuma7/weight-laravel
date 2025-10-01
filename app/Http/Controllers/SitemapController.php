<?php

namespace App\Http\Controllers;

use App\Models\WeightClass;
use Carbon\Carbon;

class SitemapController extends Controller
{
    /**
     * サイトマップインデックスを表示する。
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->view('sitemap.index')
            ->header('Content-Type', 'text/xml');
    }

    /**
     * 体重階級のサイトマップを表示する。
     *
     * @return \Illuminate\Http\Response
     */
    public function weightClasses()
    {
        $data = [
            'pages' => [
                [
                    'url' => url('/'),
                    'updateOn' => Carbon::now()->toIso8601String(),
                ]
            ],
            'updateFrequency' => 'monthly'
        ];

        return response()->view('sitemap.weight-classes', $data)
            ->header('Content-Type', 'text/xml');
    }
}
