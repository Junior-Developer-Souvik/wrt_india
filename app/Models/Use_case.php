<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Use_case extends Model
{
    use HasFactory;
    protected $table = "use_cases";

   public function useCases(){
      return $this->belongsTo(ChildService::class,'child_service_id');
   }
}
