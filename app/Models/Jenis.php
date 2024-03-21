<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    use HasFactory;
    protected $fillable = ['nama_jenis'];
    protected $table = 'jenis';

    public function menu()
    {
        return $this->hasMany(Menu::class, 'jenis_id', 'id');
    }
}
