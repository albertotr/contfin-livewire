<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Card extends Model
{
    /** @use HasFactory<\Database\Factories\CardFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'close_day', 'payment_day', 'account_id'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    public function invoices()
    {
        return $this->hasMany(Invoice::class);
    }
}
