<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Groups extends Model
{
    use HasFactory;
    protected $conection = 'mariadb';
    protected $table = 'groups';
    protected $primary_key = 'id';
    protected $fillable =[
        'id_specialization',
        'name',
        'year',
    ];
}
