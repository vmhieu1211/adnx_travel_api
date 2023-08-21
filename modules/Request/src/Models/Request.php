<?php

namespace Modules\Request\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $table = 'requests';
    protected $guarded = [];
    protected $fillable = [
        'full_name', 'customer_code','date','driver_request','pick_up_point','quantity','serve_trip','contact_method'
    ];
}
