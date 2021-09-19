<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Appeal;
class Region extends Model
{
    use HasFactory;
    public function appeals(){
        return $this->hasMany(Appeal::class);
    }
}
