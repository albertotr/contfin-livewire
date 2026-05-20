<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Subcategory extends Model
{
    /** @use HasFactory<\Database\Factories\SubcategoryFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description', 'category_id'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
