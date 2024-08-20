<?php

namespace App\Models;

use Illuminate\Database\Console\Migrations\StatusCommand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $table = 'posts';

    protected $guarded = ['id'];
}
