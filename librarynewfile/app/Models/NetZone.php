<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetZone extends Model
{
    use HasFactory;

    protected $table= 'netzone';
    
    protected $fillable = [
         'sno',
         'purpose',
         'sittingnumber',
    
    ];
}
