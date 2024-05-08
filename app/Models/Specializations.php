<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specializations extends Model
{
    use HasFactory;
    protected $conection = 'mariadb';
    protected $table = 'specializations';
    protected $primary_key = 'id';
    protected $fillable =[
        'id_faculty',
        'id_name',
    ];
}
