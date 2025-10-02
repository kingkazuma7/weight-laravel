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
        // 階級データを取得
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
    }
}