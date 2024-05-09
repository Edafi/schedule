<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group_Schedule extends Model
{
    use HasFactory;
    protected $conection = 'mariadb';
    protected $table = 'group_schedule';
    public $timestamps = false;
    protected $fillable =[
        'id_group',
        'id_schedule',
    ];
}
