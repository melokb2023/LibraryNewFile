<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NetZone extends Model
{
    use HasFactory;

    protected $table= 'netzonedata';
    
    protected $fillable = [
         'sno',
         'purpose',
         'sittingnumber',
    
    ];
}
