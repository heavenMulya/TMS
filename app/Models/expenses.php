<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class expenses extends Model
{
    use HasFactory;

    protected $table = 'expenses';
    protected $fillable = ['title','amount','description','expense_date'];
}
