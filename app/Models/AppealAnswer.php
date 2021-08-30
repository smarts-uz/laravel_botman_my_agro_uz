<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class AppealAnswer extends Model
{
    public function save(array $options = [])
    {
        // If no author has been assigned, assign the current user's id as the author of the post
        if (!$this->answered_by && Auth::user()) {
            $this->answered_by = Auth::user()->id;
        }

        parent::save();
    }
    public function scopeCurrentUser($query)
    {
        $appeals = Appeal::where('user_id', Auth::user()->id)->get();
        return Auth::user()->hasRole('admin') ? $query : $query->whereIn('appeal_id', $appeals);
    }
}
