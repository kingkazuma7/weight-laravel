<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\WeightClass; // モデルをインポート

class WeightClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // データの重複挿入を防ぐため、関連するFighterデータを含めて削除
        \DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        WeightClass::truncate();
        \DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // 挿入する全データ構造
        $data = [
            'ボクシング' => [
                ['name' => 'ミニマム級', 'weight_limit' => '47.62kg'],
                ['name' => 'ライトフライ級', 'weight_limit' => '48.97kg'],
                ['name' => 'フライ級', 'weight_limit' => '50.80kg'],
                ['name' => 'スーパーフライ級', 'weight_limit' => '52.16kg'],
                ['name' => 'バンタム級', 'weight_limit' => '53.52kg'],
                ['name' => 'スーパーバンタム級', 'weight_limit' => '55.34kg'],
                ['name' => 'フェザー級', 'weight_limit' => '57.15kg'],
                ['name' => 'スーパーフェザー級', 'weight_limit' => '58.97kg'],
                ['name' => 'ライト級', 'weight_limit' => '61.23kg'],
                ['name' => 'スーパーライト級', 'weight_limit' => '63.50kg'],
                ['name' => 'ウエルター級', 'weight_limit' => '66.68kg'],
                ['name' => 'スーパーウエルター級', 'weight_limit' => '69.85kg'],
                ['name' => 'ミドル級', 'weight_limit' => '72.57kg'],
                ['name' => 'スーパーミドル級', 'weight_limit' => '76.20kg'],
                ['name' => 'ライトヘビー級', 'weight_limit' => '79.38kg'],
                ['name' => 'クルーザー級', 'weight_limit' => '90.72kg'],
                ['name' => 'ヘビー級', 'weight_limit' => '90.72kg超'],
            ],
            'RIZIN(MMA)' => [
                ['name' => 'フライ級', 'weight_limit' => '57 kg'],
                ['name' => 'バンタム級', 'weight_limit' => '61 kg'],
                ['name' => 'フェザー級', 'weight_limit' => '66 kg'],
                ['name' => 'ライト級', 'weight_limit' => '71 kg'],
                ['name' => 'ウェルター級', 'weight_limit' => '77 kg'],
                ['name' => 'ミドル級', 'weight_limit' => '85 kg'],
                ['name' => 'ライトヘビー級', 'weight_limit' => '95 kg'],
                ['name' => 'ヘビー級', 'weight_limit' => '120 kg'],
                ['name' => '無差別級', 'weight_limit' => '無制限'],
            ],
            'UFC' => [
                ['name' => 'フライ級', 'weight_limit' => '56.7 kg'],
                ['name' => 'バンタム級', 'weight_limit' => '61.2 kg'],
                ['name' => 'フェザー級', 'weight_limit' => '65.8 kg'],
                ['name' => 'ライト級', 'weight_limit' => '70.3 kg'],
                ['name' => 'ウェルター級', 'weight_limit' => '77.1 kg'],
                ['name' => 'ミドル級', 'weight_limit' => '83.9 kg'],
                ['name' => 'ライトヘビー級', 'weight_limit' => '93.0 kg'],
                ['name' => 'ヘビー級', 'weight_limit' => '120.2 kg'],
            ],
        ];

        // データのループ処理と挿入
        foreach ($data as $type => $classes) {
            foreach ($classes as $class) {
                WeightClass::create([
                    'type' => $type,
                    'name' => $class['name'],
                    'weight_limit' => $class['weight_limit'],
                ]);
            }
        }
    }
}
