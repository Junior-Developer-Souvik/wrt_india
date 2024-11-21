<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Key_Feature;

class ChildService extends Model
{
    use HasFactory;
    protected $table = "child_services";

    public function service(){
        return $this->belongsTo(Service::class,'service_id');
    }

    public function keyFeatures()
    {
        return $this->hasMany(Key_Feature::class);
    }

    public function useCases()
    {
        return $this->hasMany(Use_case::class);
    }


}
