<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculty_Department extends Model
{
    use HasFactory;
    protected $conection = 'mariadb';
    protected $table = 'faculty_department';
    protected $fillable =[
        'id_faculty',
        'id_department',
    ];
}
