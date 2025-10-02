<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Fighter extends Model
{
    /**
     * マスアサインメントで挿入を許可するカラム
     */
    protected $fillable = [
        'name',
        'organization',
        'status',
        'weight_class_id',
        'notes',
    ];

    /**
     * この選手が所属する階級
     * 多対一のリレーションシップ
     *
     * @return BelongsTo
     */
    public function weightClass(): BelongsTo
    {
        return $this->belongsTo(WeightClass::class);
    }

    /**
     * チャンピオンかどうかを判定
     *
     * @return bool
     */
    public function isChampion(): bool
    {
        return $this->status === 'champion';
    }

    /**
     * 元チャンピオンかどうかを判定
     *
     * @return bool
     */
    public function isFormerChampion(): bool
    {
        return $this->status === 'former_champion';
    }
}
