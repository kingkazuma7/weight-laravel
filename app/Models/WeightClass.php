<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeightClass extends Model
{
    use HasFactory;
    
    // マスアサインメントで挿入を許可するカラム
    protected $fillable = [
        'type',
        'name',
        'weight_limit',
    ];

    /**
     * 体重制限を数値化して返す
     * 無制限の場合は最大値を返す
     *
     * @return float
     */
    public function getWeightLimitValue(): float
    {
        if ($this->weight_limit === '無制限' || str_contains($this->weight_limit, '超')) {
            return PHP_FLOAT_MAX;
        }

        // "kg" と空白を除去して数値に変換
        return (float) str_replace(['kg', ' '], '', $this->weight_limit);
    }

    /**
     * この階級に所属する選手たち
     * 一対多のリレーションシップ
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function fighters()
    {
        return $this->hasMany(Fighter::class);
    }

    /**
     * この階級の現在のチャンピオンを取得
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function champion()
    {
        return $this->hasOne(Fighter::class)->where('status', 'champion');
    }
}
