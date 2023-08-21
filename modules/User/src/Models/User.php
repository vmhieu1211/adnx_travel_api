<?php

namespace Modules\User\src\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $guarded = 'admin';

    protected $fillable = [
        'user_code', 'full_name', 'email', 'username', 'password', 'gender',
        'date_of_birth', 'passport', 'phone_number', 'address',
        'position_id', 'department_id', 'status'
    ];

    protected $hidden = [
        'password',
    ];
}
