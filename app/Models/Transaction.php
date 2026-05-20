<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $fillable = [
        'card_id',
        'type',
        'total_amount',
        'transaction_date',
        'description',
        'status',
        'category_id',
        'subcategory_id'
    ];

    public function card()
    {
        return $this->belongsTo(Card::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'tag_transaction');
    }

    public function installments()
    {
        return $this->hasMany(Installment::class);
    }
}
