<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $table = "services";

     // Child Services
     public function childService()
     {
         return $this->hasMany(ChildService::class, 'service_id')->where('status',1)->orderBy('position','ASC');
     }

     public function features(){
        return $this->hasMany(Feature::class,'service_id');
     }
}
