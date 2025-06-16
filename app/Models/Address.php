<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'addresses';
    protected $fillable = [
        'account_id',
        'type',
        'full_name',
        'phone_number',
        'address_line_1',
        'address_line_2',
        'ward',
        'district',
        'province',
        'postal_code',
        'country',
        'latitude',
        'longitude',
        'is_default',
        'notes'
    ];

    public function account() {
        $this->belongsTo(Account::class);
    }

    public function fullAddress()
    {
        return "{$this->street}, {$this->ward}, {$this->district}, {$this->city}";
    }

    public function scopeDefault($query)
    {
        return $query->where('is_default', true);
    }

    public function setAsDefault()
    {
        // Reset tất cả địa chỉ của người dùng khác mặc định
        static::where('account_id', $this->account_id)->update(['is_default' => false]);

        $this->update(['is_default' => true]);
    }
}
