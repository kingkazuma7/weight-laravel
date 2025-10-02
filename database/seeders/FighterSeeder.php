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
        $ufcFeatherweight = WeightClass::where('type', 'UFC(MMA)')->where('name', 'フェザー級')->first();
        $boxingFeatherweight = WeightClass::where('type', 'ボクシング')->where('name', 'フェザー級')->first();

        // RIZIN フェザー級のサンプルデータ
        if ($rizinFeatherweight) {
            Fighter::create([
                'name' => 'A選手',
                'organization' => 'RIZIN',
                'status' => 'champion',
                'weight_class_id' => $rizinFeatherweight->id,
                'notes' => '現役チャンピオン'
            ]);

            Fighter::create([
                'name' => 'B選手',
                'organization' => 'RIZIN',
                'status' => 'contender',
                'weight_class_id' => $rizinFeatherweight->id,
                'notes' => '挑戦者'
            ]);
        }

        // RIZIN ライト級のサンプルデータ
        if ($rizinLightweight) {
            Fighter::create([
                'name' => 'C選手',
                'organization' => 'RIZIN',
                'status' => 'champion',
                'weight_class_id' => $rizinLightweight->id,
                'notes' => '現役チャンピオン'
            ]);
        }

        // UFC フェザー級のサンプルデータ
        if ($ufcFeatherweight) {
            Fighter::create([
                'name' => 'D選手',
                'organization' => 'UFC',
                'status' => 'champion',
                'weight_class_id' => $ufcFeatherweight->id,
                'notes' => '現役チャンピオン'
            ]);
        }

        // ボクシング フェザー級のサンプルデータ
        if ($boxingFeatherweight) {
            Fighter::create([
                'name' => 'E選手',
                'organization' => 'WBC',
                'status' => 'champion',
                'weight_class_id' => $boxingFeatherweight->id,
                'notes' => 'WBC世界チャンピオン'
            ]);
        }
    }
}