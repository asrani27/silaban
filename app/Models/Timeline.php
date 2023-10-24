<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timeline extends Model
{
    use HasFactory;
    protected $table = 'timeline';
    protected $guarded = ['id'];

    public function step_satu()
    {
        return $this->hasOne(Step1::class, 'timeline_id');
    }
}
