<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DebtMen extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    public function debts() {
        return $this->hasMany(Debt::class);
    }
}
