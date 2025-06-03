<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rooms extends Model
{
    use HasFactory;
    protected $table = 'rooms';
    protected $fillable = ['rent_amount','status','type','room_number'];

    public function tenant()
    {
        return $this->hasOne(tenants::class,'room_id');
    }
    

}
