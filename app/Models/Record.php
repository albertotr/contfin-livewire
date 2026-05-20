<?php

namespace App\Models;

use App\Enums\Method;
use App\Enums\Type;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Record extends Model
{
    /** @use HasFactory<\Database\Factories\RecordFactory> */
    use HasFactory;

    protected $casts = [
        'type' => Type::class, // Cast para o Enum
        'method' => Method::class, // Cast para o Enum
    ];

    protected $fillable = [
        'type',
        'method',
        'amount',
        'due_date',
        'due',
        'category_id',
        'subcategory_id',
        'account_id',
        'balance',
        'estimate',
        'description',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'record_tag');
    }
}
