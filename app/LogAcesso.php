<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogAcesso extends Model
{
    use HasFactory;
    protected $fillable = ['log'];
}
