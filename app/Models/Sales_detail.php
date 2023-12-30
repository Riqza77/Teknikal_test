<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sales_detail extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function sales()
    {
       return $this->belongsTo(Sales::class, 'id', 'sales_id');    
    }

    public function inventory()
    {
       return $this->belongsTo(Inventory::class, 'inventory_id', 'id');    
    }
}
