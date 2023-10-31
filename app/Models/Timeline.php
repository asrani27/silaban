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
    public function step_dua()
    {
        return $this->hasOne(Step2::class, 'timeline_id');
    }
    public function step_tiga()
    {
        return $this->hasOne(Step3::class, 'timeline_id');
    }
    public function step_empat()
    {
        return $this->hasOne(Step4::class, 'timeline_id');
    }
    public function step_lima()
    {
        return $this->hasOne(Step5::class, 'timeline_id');
    }
}
