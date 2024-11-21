<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Key_Feature extends Model
{
    use HasFactory;
    protected $table = "key_features";

    public function childService()
    {
        return $this->belongsTo(ChildService::class,'child_service_id');
    }

}
