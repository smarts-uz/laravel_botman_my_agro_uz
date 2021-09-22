<?php
namespace App\Actions;

use App\Models\Appeal;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Actions\AbstractAction;

class SendUser extends AbstractAction {
    public function getTitle(){
        return "Send";
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
            'class' => 'btn btn-sm btn-primary pull right',

        ];
    }
    public function getDefaultRoute()
    {
        // , compact('appeal_id')
        return route('answer.send', ['appeal' => $this->data->id]);
    }
    public function shouldActionDisplayOnDataType()
    {
        if(Auth::user()->role->name == "moderator"){
            return $this->dataType->slug == 'appeals';
        }
    }
}
