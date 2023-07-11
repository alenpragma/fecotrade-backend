<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\PackageSetting;

class Purchase extends Model
{
    use HasFactory;
    
    protected $table ="purchases";
    public function packages()
    {

         return $this->belongsTo(PackageSetting::class, 'package_id');

    }
}
