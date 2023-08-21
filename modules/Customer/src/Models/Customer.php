<?php

namespace Modules\Customer\src\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Customer extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'customers';

    protected $guarded = ['customer'];

    protected $fillable = [
        'customer_code', 'full_name','customer_name', 'email', 'phone_number', 'password',
        'address', 'gender', 'date_of_birth', 'passport', 'status'
    ];

    protected $hidden = ['password'];
}
