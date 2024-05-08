<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    use HasFactory;
    protected $conection = 'mariadb';
    protected $table = 'departments';
    protected $primary_key = 'id';
    protected $fillable =[
        'name',
        'type',
    ];
}
