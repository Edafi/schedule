<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    use HasFactory;
    protected $conection = 'mariadb';
    protected $table = 'schedule';
    protected $primary_key = 'id';
    public $timestamps = false;
    protected $fillable =[
        'id_class',
        'id_audience',
        'id_teacher',
        'day',
        'time',
        'added',
    ];

}
