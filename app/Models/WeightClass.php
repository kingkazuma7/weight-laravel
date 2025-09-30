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
}
