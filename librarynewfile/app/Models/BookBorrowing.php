<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookBorrowing extends Model
{
    use HasFactory;

    protected $table = 'bookborrowingdetail';
    
    protected $fillable = [
         'sno',
         'bookno',
         'bookdescription',
         'bookcode',
    ];
}
