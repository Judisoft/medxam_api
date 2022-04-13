<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Score extends Model
{
    use HasFactory;

    protected $fillable =[
        'user_id',
        'week_id',
        'bio',
        'chem',
        'phy',
        'gen_know',
        'lang',
        'total',
        'created_at',
        'updated_at'
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }
}
