<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Account extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasApiTokens, HasFactory, Notifiable;
    protected $table = 'accounts';

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'email_verified_at',
        'password',
        'status',
        'roles',
        'login_history',
        'logs'
    ];

    public function addresses() {
        $this->hasMany(Address::class);
    }

    public function payments() {
        return $this->hasMany(Payment::class);
    }

    public function orders() {
        return $this->hasMany(Order::class);
    }

    public function carts() {
        return $this->hasMany(Cart::class);
    }

    public function postComments() {
        return $this->hasMany(PostComment::class);
    }

    public function profile() {
        return $this->hasOne(Profile::class);
    }

    public function getTotalPaidAttribute(): float
    {
        return $this->payments()
            ->where('status', 'completed')
            ->sum('amount');
    }

    public function scopeActive($query) {
        return $query->where('is_active', true);
    }

    public function scopeWithRole($query, $role) {
        return $query->where('role', $role);
    }

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    public function hasRole($role)
    {
        return $this->roles === $role;
        // admin, staff, user
    }

    public function mergeSessionCartToDatabase()
    {
        $items = session('cart.items', []);
        $cart = Cart::firstOrCreate(['account_id' => auth()->id()]);

        foreach ($items as $productId => $item) {
            $cart->addItem($productId, $item['quantity']);
        }

        session()->forget('cart.items');
    }

    public function updateLastLogin() {
        $this->login_history[] = now();
        $this->save();
    }


    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
            'is_active' => 'boolean',
        ];
    }
}
