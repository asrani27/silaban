<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Step1 extends Model
{
    use HasFactory;
    protected $table = 'step1';
    protected $guarded = ['id'];
}
