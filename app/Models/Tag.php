<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    /** @use HasFactory<\Database\Factories\TagFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'description'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function records()
    {
        return $this->belongsToMany(Record::class, 'record_tag');
    }

    public function transactions()
    {
        return $this->belongsToMany(Transaction::class, 'tag_transaction');
    }
}
