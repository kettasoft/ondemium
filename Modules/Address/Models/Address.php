<?php

namespace Modules\Address\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $hidden = ['addressable_id', 'addressable_type', 'created_at', 'updated_at'];
    
    protected static function newFactory()
    {
        return \Modules\Address\Database\factories\AddressFactory::new();
    }
}
