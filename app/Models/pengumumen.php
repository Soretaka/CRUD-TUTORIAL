<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pengumumen extends Model
{
    use HasFactory;
    protected $table = 'pengumumen';
    protected $guarded = [];
    protected $fillable =[
        'Nama',
        'Umur'
    ];
    public function penyakit(){
        return $this->hasMany(Penyakit::class);
    }
}
