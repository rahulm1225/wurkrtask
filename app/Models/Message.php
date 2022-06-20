<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $table = 'individual_chat';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        '_id',
        'created_at',
        'file_name',
        'file_type',
        'file_url',
        'from_user_first_name',
        'from_user_id',
        'is_read',
        'message',
        'message_type',
        'timestamp',
        'to_user_first_name',
        'to_user_id',
        'updated_at',
        'user_id',
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

    protected $appends = [
        // 'selfmessage' 
    ];

    // public function getSelfMessageAttribute()
    // {
    //     dd(auth()->user());
    //     return $this->from_user_id === auth()->user()->_id;
    // }

    public function user()
    {
       return $this->belongsTo(User::class);
    }
}
