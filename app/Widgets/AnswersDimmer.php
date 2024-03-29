<?php

namespace App\Widgets;

use App\Models\Conversation;
use Illuminate\Support\Str;
use TCG\Voyager\Widgets\BaseDimmer;

class AnswersDimmer extends BaseDimmer
{
    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {
        // dd(Conversation::groupBy('appeal_id'));
        $count = Conversation::groupBy('appeal_id')->count();
        $string = trans_choice('dimmer.post', $count);
        // $string = "Ответы";

        return view('voyager::dimmer', array_merge($this->config, [
            'icon'   => 'voyager-news',
            'title'  => "{$count} {$string}",
            'text'   => trans('dimmer.post_text', ['count' => $count, 'string' => Str::lower($string)]),
            'button' => [
                'text' =>  trans('dimmer.buttonanswers'),
                'link' => route('voyager.appeals.index'),
            ],
            'image' => "data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAAAA1BMVEVguSIPyqLvAAAAR0lEQVR4nO3BAQEAAACCIP+vbkhAAQAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAO8GxYgAAb0jQ/cAAAAASUVORK5CYII=",
        ]));
    }
    public function shouldBeDisplayed()
    {
        return auth()->user()->hasRole('admin');
    }


}
