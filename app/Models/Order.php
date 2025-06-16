<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'account_id',
        'status',
        'total',
        'shipping_address',
        'payment_method',
    ];

    protected $casts = [
        'total' => 'double',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function payment()
    {
        return $this->hasOne(Payment::class);
    }

    // Nếu bạn vẫn muốn override total từ DB:
    public function getTotalAttribute()
    {
        return $this->orderItems->sum(fn($item) => $item->subtotal);
    }

    // Hoặc cách tốt hơn:
    public function getCalculatedTotalAttribute()
    {
        return $this->orderItems->sum(fn($item) => $item->subtotal);
    }

    public function scopeByStatus($query, $status)
    {
        return $query->where('status', $status);
    }

    public function scopeLatest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
