<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Account extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = ['name', 'balance', 'estimate'];

    protected $hidden = ['created_at', 'deleted_at', 'updated_at'];

    public function records()
    {
        return $this->hasMany(Record::class);
    }

    public function cards()
    {
        return $this->hasMany(Card::class);
    }
}
