<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trade extends Model
{
    use HasFactory;
    protected $table = 'trades';
    protected $fillable = ['date', 'name', 'cash', 'terminal', 'product', 'cost', 'comment'];
}
