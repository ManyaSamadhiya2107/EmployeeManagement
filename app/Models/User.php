<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable {
  use HasFactory;
    protected $fillable=[
        'name',
        'email',
        'date_of_birth',
        'password',
        'profile_picture',
        'qualifications',
        'experience',
        'permanent_address_line1',
        'permanent_address_line2',
        'permanent_city',
        'permanent_state',
        'current_address_line1',
        'current_address_line2',
        'current_city',
        'current_state',
        'role'
    ];
}
