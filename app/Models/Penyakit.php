<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;
    protected $table = 'penyakits';
    protected $guarded = [];
    protected $fillable =[
        'Penyakit',
        'pengumumen_id'
    ];
    public function pengumumen(){
        return $this->belongsTo(pengumumen::class);
    }
}
