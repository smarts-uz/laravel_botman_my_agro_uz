<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
class Appeal extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function region()
    {
        return $this->belongsTo(Region::class, 'region');
    }
    public function routes()
    {
        return $this->belongsTo(Routes::class, 'route', 'id');
    }
    public function action()
    {
        return $this->belongsTo(Action::class, 'type', 'id');
    }
    // protected $fillable = ["messages"];
    public function scopeCurrentUser($query)
    {
        // return Auth::user()->hasRole('admin') ? $query : (Auth::user()->hasRole('moderator') ? $query->where('responsible', Auth::user()->id) : $query->where('user_id', Auth::user()->id));
        $routes = Routes::where('responsible', Auth::user()->id)->get();
        return (Auth::user()->hasRole('admin') || Auth::user()->hasRole('moderator')) ? $query : ((Auth::user()->hasRole('expert')) ? $query->whereIn('route', $routes) :  ($query->where('user_id', Auth::user()->id)));
    }
}
