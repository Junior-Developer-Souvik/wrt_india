<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feature extends Model
{
    use HasFactory;
    protected $table = "features";

    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }
}
