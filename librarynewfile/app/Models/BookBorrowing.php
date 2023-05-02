<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookBorrowing extends Model
{
    use HasFactory;

    protected $table = 'bookborrowing';
    
    protected $fillable = [
         'bookno',
         'bookdescription',
         'bookcode',
    ];
}
