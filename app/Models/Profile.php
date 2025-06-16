<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'full_name',
        'nickname',
        'avatar',
        'sub_avatar',
        'bio',
        'gender',
        'birthday',
        'location',
        'phone',
        'social',
        'website',
        'hobbies',
        'jobs',
        'education',
        'skills',
        'timezone',
        'notifications',
        'is_public',
    ];

    protected $casts = [
        'birthday' => 'date',
        'timezone' => 'datetime',
        'is_public' => 'boolean',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    // Scope lấy hồ sơ công khai
    public function scopePublic($query)
    {
        return $query->where('is_public', true);
    }

    // Hàm trả về tuổi dựa trên birthday
    public function getAgeAttribute()
    {
        return $this->birthday ? $this->birthday->age : null;
    }

    // Accessor lấy URL avatar mặc định nếu chưa có avatar
    public function getAvatarUrlAttribute()
    {
        return $this->avatar ?: asset('images/default-avatar.png');
    }

    // Accessor lấy timezone dưới dạng string (nếu cần)
    public function getTimezoneStringAttribute()
    {
        return $this->timezone ? $this->timezone->format('P') : null;
    }
}
