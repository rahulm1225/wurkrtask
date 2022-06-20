<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        '_id', 
        'created_at', 
        'default_office_id', 
        'email', 
        'encrypted_password', 
        'first_name', 
        'gender', 
        'is_blocked', 
        'is_signed_in_with_google', 
        'is_signed_in_with_linkedin', 
        'last_login', 
        'last_name', 
        'organization_id', 
        'organization_name', 
        'password', 
        'role_id', 
        'updated_at', 
        'user_custom_status', 
        'user_image_name', 
        'user_image_path', 
        'user_status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        // 
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }
}
