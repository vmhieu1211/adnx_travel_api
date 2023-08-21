<?php

namespace Modules\Position\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;

    protected $table = 'positions';

    protected $primaryKey = 'id';

    protected $fillable = [
        'name', 'description', 'status'
    ];
}
