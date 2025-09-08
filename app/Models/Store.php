<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address_id',
        'category',
        'phone'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
