<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tenants extends Model
{
    use HasFactory;

    protected $table = 'tenants';
    protected $fillable = ['full_name',	'phone','email','id_number','room_id','lease_start','lease_end'];
    public function room()
{
    return $this->belongsTo(rooms::class, 'room_id');
}

public function payments()
{
    return $this->hasMany(payments::class, 'tenant_id');
}

}
