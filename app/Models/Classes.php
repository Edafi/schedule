<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
    use HasFactory;
    protected $conection = 'mariadb';
    protected $table = 'classes';
    protected $primary_key = 'id';
    protected $fillable =[
        'type',
        'name',
        'hours',
        'id_department',
    ];
}
