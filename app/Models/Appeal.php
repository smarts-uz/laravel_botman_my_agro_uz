<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Appeal extends Model
{
    public function scopeCurrentUser($query)
    {
        // return Auth::user()->hasRole('admin') ? $query : (Auth::user()->hasRole('moderator') ? $query->where('responsible', Auth::user()->id) : $query->where('user_id', Auth::user()->id));
        $routes = Routes::where('responsible', Auth::user()->id)->get();
        return Auth::user()->hasRole('admin') ? $query : ((Auth::user()->hasRole('expert')) ? $query->whereIn('route', $routes) :  $query->where('to_user', '1')->where('user_id', Auth::user()->id));
    }
}
