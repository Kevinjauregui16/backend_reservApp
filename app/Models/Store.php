<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'category_id',
        'street',
        'number_ext',
        'city',
        'state',
        'postal_code',
        'neighborhood',
        'url_maps',
        'phone'
    ];

    public function address()
    {
        return $this->belongsTo(Address::class);
    }
}
