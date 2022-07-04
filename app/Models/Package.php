<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PackagesType;
class Package extends Model
{
    use HasFactory;

    public function package_type_details(){
        return $this->belongsTo(PackagesType::class,'package_type','id');
    }
}
