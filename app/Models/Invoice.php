<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    /** @use HasFactory<\Database\Factories\InvoiceFactory> */
    use HasFactory;

    protected $fillable = ['card_id', 'total_amount', 'payment_date', 'due_date'];

    protected $hidden = ['created_at', 'updated_at'];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }
}
