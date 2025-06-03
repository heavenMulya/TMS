<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class payments extends Model
{
    use HasFactory;
    protected $table = 'payments';
    protected $fillable = ['tenant_id','amount','payment_date','month_paid_for','method','receipt_number'];
   
    public function tenant()
    {
        return $this->belongsTo(tenants::class, 'tenant_id');
    }

  

    
}
