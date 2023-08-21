<?php

namespace Modules\Department\src\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $table = 'departments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'department_code', 'name', 'description', 'status'
    ];
}
