<?php

namespace App\Models;

use App\Enums\Products\Status;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $casts = [
        'status' => Status::class
    ];
    protected $guarded = [];

    public function getCanDeleteAttribute(){
        return $this->status === Status::unavailable;
    }

    public function scopeOfActive($query){
        return $query->where('status', Status::available);
    }

}
