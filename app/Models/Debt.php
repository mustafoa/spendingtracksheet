<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Debt extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'receive', 'given', 'comment', 'debt_men_id'];

    public function debtmen() {
        return $this->belongsTo(DebtMen::class);
    }
}
