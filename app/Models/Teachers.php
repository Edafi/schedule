<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teachers extends Model
{
    use HasFactory;
    protected $conection = 'mariadb';
    protected $table = 'teachers';
    protected $primary_key = 'id';
    protected $fillable =[
        'id_department',
        'name',
        'teacher_type',
    ];
}
