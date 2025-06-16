<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_id',
        'account_id',
        'method',
        'amount',
        'payment_gateway',
        'gateway_response',
        'card_brand',
        'last_four',
        'receipt_url',
        'notes',
        'status',
        'transaction_info',
    ];

    protected $casts = [
        'amount' => 'double',
        'gateway_response' => 'array',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // ────────────────────────────────────────
    // Quan hệ
    // ────────────────────────────────────────

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // ────────────────────────────────────────
    // Scope
    // ────────────────────────────────────────

    public function scopeCompleted($query)
    {
        return $query->where('status', 'completed');
    }

    public function scopePending($query)
    {
        return $query->where('status', 'pending');
    }

    public function scopeFailed($query)
    {
        return $query->where('status', 'failed');
    }

    public function scopeOfUser($query, $accountId)
    {
        return $query->where('account_id', $accountId);
    }

    // ────────────────────────────────────────
    // Helpers kiểm tra trạng thái
    // ────────────────────────────────────────

    public function isCompleted()
    {
        return $this->status === 'completed';
    }

    public function isPending()
    {
        return $this->status === 'pending';
    }

    public function isFailed()
    {
        return $this->status === 'failed';
    }

    public function isCanceled()
    {
        return $this->status === 'canceled';
    }

    // ────────────────────────────────────────
    // Định dạng hiển thị
    // ────────────────────────────────────────

    public function getMaskedCardAttribute()
    {
        return $this->card_brand && $this->last_four
            ? strtoupper($this->card_brand) . ' **** ' . $this->last_four
            : null;
    }

    // ────────────────────────────────────────
    // Tổng tiền đã thanh toán theo user
    // ────────────────────────────────────────

    public static function totalPaidByUser($accountId)
    {
        return static::completed()->ofUser($accountId)->sum('amount');
    }

    // ────────────────────────────────────────
    // Kiểm tra gateway
    // ────────────────────────────────────────

    public function isMomo()
    {
        return $this->payment_gateway === 'momo';
    }

    public function isVNPay()
    {
        return $this->payment_gateway === 'vnpay';
    }

    public function isCash()
    {
        return $this->method === 'cash';
    }
}
