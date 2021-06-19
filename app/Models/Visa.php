<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    use HasFactory;
    protected $table='visas';
    protected $fillable=[
        'title', 'boxnumber', 'content', 'image'
    ];
}
