<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded = ['id'];
    protected $table = 'menu';
    public function jenis()
    {
        return $this->belongsTo(Jenis::class, 'jenis_id');
    }
}

