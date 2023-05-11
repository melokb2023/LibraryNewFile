<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table= 'student_info';
    
    protected $fillable = [
         'idNo',
         'firstName',
         'middleName',
         'lastName',
         'suffix',
         'course',
         'year',
         'birthDate',
         'gender',
    ];
}
