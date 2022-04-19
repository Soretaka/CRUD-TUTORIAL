<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
        protected $table = 'pengumumen';
    protected $guarded = [];
    protected $fillable =[
        'Nama',
        'Umur',
        'Penyakit'
    ];
}
