<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterServiceMan extends Model
{
    use HasFactory;
    protected $table = "register";
    protected $fillable = ['id','user_id','address','type','price'];
}
