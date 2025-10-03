<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fighter;
use App\Models\WeightClass;

class FighterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // RIZIN階級データを取得
        $rizinFeatherweight = WeightClass::where('type', 'RIZIN(MMA)')->where('name', 'フェザー級')->first();
        $rizinLightweight = WeightClass::where('type', 'RIZIN(MMA)')->where('name', 'ライト級')->first();
        $rizinBantamweight = WeightClass::where('type', 'RIZIN(MMA)')->where('name', 'バンタム級')->first();

        // RIZIN ライト級 - ホベルト・サトシ・ソウザ（現チャンピオン）
        if ($rizinLightweight) {
            Fighter::create([
                'name' => 'ホベルト・サトシ・ソウザ',
                'organization' => 'RIZIN',
                'status' => 'champion',
                'weight_class_id' => $rizinLightweight->id,
                'notes' => '防衛5回'
            ]);
        }

        // RIZIN フェザー級 - ラジャブアリ・シェイドゥラエフ（現チャンピオン）
        if ($rizinFeatherweight) {
            Fighter::create([
                'name' => 'ラジャブアリ・シェイドゥラエフ',
                'organization' => 'RIZIN',
                'status' => 'champion',
                'weight_class_id' => $rizinFeatherweight->id,
                'notes' => '防衛1回'
            ]);
        }

        // RIZIN バンタム級 - 井上直樹（現チャンピオン）
        if ($rizinBantamweight) {
            Fighter::create([
                'name' => '井上直樹',
                'organization' => 'RIZIN',
                'status' => 'champion',
                'weight_class_id' => $rizinBantamweight->id,
                'notes' => '防衛2回'
            ]);
        }

        // UFC階級データを取得
        $ufcFlyweight = WeightClass::where('type', 'UFC')->where('name', 'フライ級')->first();
        $ufcBantamweight = WeightClass::where('type', 'UFC')->where('name', 'バンタム級')->first();
        $ufcFeatherweight = WeightClass::where('type', 'UFC')->where('name', 'フェザー級')->first();
        $ufcLightweight = WeightClass::where('type', 'UFC')->where('name', 'ライト級')->first();
        $ufcWelterweight = WeightClass::where('type', 'UFC')->where('name', 'ウェルター級')->first();
        $ufcMiddleweight = WeightClass::where('type', 'UFC')->where('name', 'ミドル級')->first();
        $ufcLightHeavyweight = WeightClass::where('type', 'UFC')->where('name', 'ライトヘビー級')->first();
        $ufcHeavyweight = WeightClass::where('type', 'UFC')->where('name', 'ヘビー級')->first();

        // UFCチャンピオンデータを追加
        $ufcChampions = [
            ['class' => $ufcFlyweight, 'name' => 'アレシャンドレ・パントージャ'],
            ['class' => $ufcBantamweight, 'name' => 'メラブ・ドバリシビリ'],
            ['class' => $ufcFeatherweight, 'name' => 'アレクサンダー･ヴォルカノフスキー'],
            ['class' => $ufcLightweight, 'name' => 'イリア・トプリア'],
            ['class' => $ufcWelterweight, 'name' => 'ジャック・デラ・マダレナ'],
            ['class' => $ufcMiddleweight, 'name' => 'ハムザト・チマエフ'],
            ['class' => $ufcLightHeavyweight, 'name' => 'マゴメド・アンカラエフ'],
            ['class' => $ufcHeavyweight, 'name' => 'トム・アスピナル'],
        ];

        foreach ($ufcChampions as $champion) {
            if ($champion['class']) {
                Fighter::create([
                    'name' => $champion['name'],
                    'organization' => 'UFC',
                    'status' => 'champion',
                    'weight_class_id' => $champion['class']->id,
                ]);
            }
        }
    }
}