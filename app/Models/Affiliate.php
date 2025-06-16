<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Affiliate extends Model
{
    protected $fillable = ['account_id', 'product_id', 'ref_code', 'clicks', 'conversions', 'commission_total'];
}
