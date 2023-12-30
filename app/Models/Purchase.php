<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function detail()
    {
       return $this->hasMany(Purchase_detail::class, 'purchase_id', 'id');
    }
}
