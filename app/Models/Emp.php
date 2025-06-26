<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Emp extends Model
{
    protected $table = 'emps';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'email',
    ];

}
