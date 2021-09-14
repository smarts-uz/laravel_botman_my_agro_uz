<?php
namespace App\Actions;

use App\Models\Appeal;
use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Actions\AbstractAction;

class ChatAction extends AbstractAction {
    public function getTitle(){
        return "Chat";
    }
    public function getIcon(){
        return 'voyager-chat';
    }
    public function getPolicy(){
        return 'read';
    }
    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull left',

        ];
    }
    public function getDefaultRoute()
    {
        // , compact('appeal_id')
        return route('conversation.index', ['appeal' => $this->data->id]);
    }
    public function shouldActionDisplayOnDataType()
    {
        // if(Auth::user()->role->name != "user"){
            return $this->dataType->slug == 'appeals';

        // }
    }
}
