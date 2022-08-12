<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    protected $fillable = ['title', 'description', 'tag'];
    use HasFactory;
}