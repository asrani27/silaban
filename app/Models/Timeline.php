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
    public function step_enam()
    {
        return $this->hasOne(Step6::class, 'timeline_id');
    }
    public function step_tujuh()
    {
        return $this->hasOne(Step7::class, 'timeline_id');
    }
    public function step_delapan()
    {
        return $this->hasOne(Step8::class, 'timeline_id');
    }
    public function step_sembilan()
    {
        return $this->hasOne(Step9::class, 'timeline_id');
    }
    public function step_sepuluh()
    {
        return $this->hasOne(Step10::class, 'timeline_id');
    }
    public function step_sebelas()
    {
        return $this->hasOne(Step11::class, 'timeline_id');
    }
    public function step_duabelas()
    {
        return $this->hasOne(Step12::class, 'timeline_id');
    }
    public function step_tigabelas()
    {
        return $this->hasOne(Step13::class, 'timeline_id');
    }
    public function step_empatbelas()
    {
        return $this->hasOne(Step14::class, 'timeline_id');
    }
    public function step_limabelas()
    {
        return $this->hasOne(Step15::class, 'timeline_id');
    }
    public function step_enambelas()
    {
        return $this->hasOne(Step16::class, 'timeline_id');
    }
    public function step_tujuhbelas()
    {
        return $this->hasOne(Step17::class, 'timeline_id');
    }
}
