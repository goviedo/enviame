<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persistir extends Model
{
    use HasFactory;

    protected $table = "persistir";

    protected $fillable = ['texto'];
}
