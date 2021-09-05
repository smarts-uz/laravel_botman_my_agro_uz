<?php
namespace App\Actions;

use App\Models\Appeal;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Actions\AbstractAction;

class ResponsibleAction extends AbstractAction {
    public function getTitle(){
        return "ToExpert";
    }
    public function getIcon(){
        return 'voyager-double-right';
    }
    public function getPolicy(){
        return 'read';
    }
    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-warning pull right',

        ];
    }
    public function getDefaultRoute()
    {
        // , compact('appeal_id')
        return route('answer.redirect', ['appeal' => $this->data->id]);
    }
    public function shouldActionDisplayOnDataType()
    {
        if(Auth::user()->role->name != "user" && Auth::user()->role->name != "expert"){
            return $this->dataType->slug == 'appeals';

        }
    }
}
