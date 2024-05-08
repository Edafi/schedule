<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Audiences extends Model
{
    use HasFactory;
    protected $conection = 'mariadb';
    protected $table = 'audiences';
    protected $primary_key = 'id';
    protected $fillable =[
        'name',
        'type',
        'size'
    ];
}
