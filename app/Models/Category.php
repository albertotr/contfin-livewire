<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description'];

    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
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
